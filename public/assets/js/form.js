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

    $("#next-1").click(function () {
        if (v.form()) {
            $(".tab").hide("fast");
            $("#tab-2").show("slow");
            $("#step-1").removeClass("breadcrumbs-active");
            $("#step-2").addClass("breadcrumbs-active");
        } else {
            $("#badform").show("slow").delay(2500).fadeOut();
        }
    });

    $("#back-2").click(function () {
        $(".tab").hide("fast");
        $("#tab-1").show("slow");
        $("#step-1").addClass("breadcrumbs-active");
        $("#step-2").removeClass("breadcrumbs-active");
    });

    $("#next-2").click(function () {
        $(".tab").hide("fast");
        $("#tab-3").show("slow");
        $("#step-3").addClass("breadcrumbs-active");
        $("#step-2").removeClass("breadcrumbs-active");
    });

});