$.validator.addMethod(
    "required_without",
    function(value,el,fields) {

        var val,present = true;

        fields.forEach(function(field) {
            val = $("[name="+field+"]").val().trim();

            if (!val) present=false;

        });

        return !(!present && !value.trim());

    },
    "Please enter value for this field"
);