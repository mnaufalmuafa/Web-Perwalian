var form2 = new Vue({
    el : "main",
    data : {
        formSequence : 0,
        dataDosen : null,
        selectedLecturerId : 0,
        arrClass : [],
        selectedClassId : 0,
        selectedClassGenerationId : null,
        arrStudent : null,
        arrSchoolYear : [],
        selectedSchoolYearId : 0,
        selectedSemester : "Ganjil",
        arrQuestions : [],
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    methods : {
        onpageshow : function(event) {
            this.fetchSchoolYear();

            fetch("/api/get/dosen/for_form")
                .then(response => response.json())
                .then(data => this.assignData(data));

            this.assignDataFromURL();
            this.formSequence = parseInt(document.getElementsByName("form_sequence")[0].getAttribute("content"));

            if (this.selectedLecturerId !== 0) {
                this.setupSelectedLecturer();
            }
            if (this.selectedClassId !== 0) {
                this.setupSelectedClass();
            }
            
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                window.location.reload();
            }
        },
        assignDataFromURL : function() {
            this.selectedLecturerId = this.getUrlVars()["lecturer_id"];
            this.selectedClassId = this.getUrlVars()["class_id"];
            this.selectedSemester = this.getUrlVars()["semester"];
            this.selectedSchoolYearId = this.getUrlVars()["school_year_id"];
        },
        fetchSchoolYear : function() {
            fetch("/api/get/school_year/all")
                .then(response => response.json())
                .then(data => this.assignSchoolYear(data));
        },
        assignSchoolYear : function(data){
            this.arrSchoolYear = data;
        },
        assignData : function(data) {
            this.dataDosen = this.filterDeleted(data);
        },
        filterDeleted : function(data) {
            let i = 0;
            let deleted_index = [];
            for (const d of data) {
                if (d.is_deleted == 1) {
                    deleted_index.push(i);
                }
                i = i + 1;
            }
            
            if (deleted_index.length !== 0) {
                for (let i = deleted_index.length - 1; i >= 0 ; i--) {
                    data.splice(deleted_index[i], 1);
                }
            }
            
            return data;
        },
        selectLecturerOnChange : function() {
            window.location.href = "/form"+this.formSequence+"?lecturer_id="+this.selectedLecturerId+"&class_id=0&school_year_id="+this.selectedSchoolYearId+"&semester="+this.selectedSemester;
        },
        selectClassOnChange : function() {
            window.location.href = "/form"+this.formSequence+"?lecturer_id="+this.selectedLecturerId+"&class_id="+this.selectedClassId+"&school_year_id="+this.selectedSchoolYearId+"&semester="+this.selectedSemester;
        },
        reloadWithUpdatedValue : function() {
            window.location.href = "/form"+this.formSequence+"?lecturer_id="+this.selectedLecturerId+"&class_id="+this.selectedClassId+"&school_year_id="+this.selectedSchoolYearId+"&semester="+this.selectedSemester;
        },
        rbSemesterOnChange : function(event) {
            var data = event.target.value;
            this.selectedSemester = data;
            this.reloadWithUpdatedValue();
        },
        getUrlVars : function() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                vars[key] = value;
            });
            return vars;
        },
        setupSelectedLecturer : function() {
            fetch("/api/get/kelas/by_homeroomid?homeroom_id="+this.selectedLecturerId)
                .then(response => response.json())
                .then(data => this.arrClass = data);
            if (this.arrClass.length > 0 && this.getUrlVars()["class_id"] != 0) {
                this.selectedClassId = this.getUrlVars()["class_id"];
                this.setupSelectedClass();
            }
        },
        setupSelectedClass : function() {
            fetch("/api/get/mahasiswa/for_form_page?class_id="+this.selectedClassId)
                .then(response => response.json())
                .then(data => this.arrStudent = data)
                .then(this.fetchClassGeneration);
        },
        fetchClassGeneration() {
            fetch("/api/get/kelas/get_generation_id?class_id="+this.selectedClassId)
                .then(response => response.json())
                .then(data => this.selectedClassGenerationId = data)
                .then(this.fetchQuestion);
        },
        fetchQuestion : function() {
            fetch("http://127.0.0.1:8000/api/get/question/form?sequence="+this.formSequence)
                .then(response => response.json())
                .then(data => this.arrQuestions = data);
        }
    }
});