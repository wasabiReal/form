jQuery().ready(function () {

    var v = jQuery("#register-form").validate({
        rules: {
            fn: {
                required: true,
                minlength: 2,
                maxlength: 16
            },
            ln: {
                required: true,
                minlength: 2,
                maxlength: 16
            },
            birthday: {
                required: true
            },
            report: {
                required: true,
                minlength: 2,
                maxlength: 32,
            },
            country: {
                required: true
            },
            phone: {
                required: true,
                phoneUS: true
            },
            email: {
                required: true,
                minlength: 2,
                email: true,
                maxlength: 50
            }
        },
    });

    function saveData(key, value) {
        localStorage.setItem(key, value);
    }

    function loadData(key) {
        return localStorage.getItem(key);
    }

    if(loadData("tab") === '2'){
        $(".tab").hide("fast");
        $("#tab-2").show("slow");
        $("#step-1").removeClass("breadcrumbs-active");
        $("#step-2").addClass("breadcrumbs-active");
    }else{
        $(".tab").hide("fast");
        $("#tab-1").show("fast");
        $("#step-1").addClass("breadcrumbs-active");
        $("#step-2").removeClass("breadcrumbs-active");
    }

    $("#next-1").click(function () {
        if (v.form()) {
            saveData("tab", 2);
            $(".tab").hide("fast");
            $("#tab-2").show("slow");
            $("#step-1").removeClass("breadcrumbs-active");
            $("#step-2").addClass("breadcrumbs-active");
        } else {
            $("#badform").show("slow").delay(2500).fadeOut();
        }
    });

    $("#back-2").click(function () {
        saveData("tab", 1);
        $(".tab").hide("fast");
        $("#tab-1").show("slow");
        $("#step-1").addClass("breadcrumbs-active");
        $("#step-2").removeClass("breadcrumbs-active");

    });

    $("#next-2").click(function () {
        $(".tab").hide("fast");
        $("#tab-3").show("slow");
        $(".breadcrumbs").hide("fast");
        $("h1").hide("fast");
        $(".iframe-map").hide("fast");
    });
});

$(document).ready(function () {
    $("#submit").click(function (e) {
        e.preventDefault();
        const data = new FormData(document.getElementById("register-form"));
        var files = $('#image')[0].files;
        data.append('image',files[0]);
        $.ajax({
            type: "POST",
            url: "public/assets/scripts/form.php",
            data: data,
            processData: false,
            contentType: false,
            success: function () {

            }
        });
    });
});