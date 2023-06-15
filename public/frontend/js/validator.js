function Validator(option) {
    var formElement = document.querySelector(option.form);
    var rulesList = {};
    if(formElement) {
        var getParentElement = function(inputElement, formGroupSelector) {
            var result = inputElement.parentElement;
            while(!result.matches(formGroupSelector)) {
                result = result.parentElement;
            }
            return result;
        }

        var validate = function(inputElement, messageElement, rule) {
            var errorMessage;
            
            for(var i=0; i < rulesList[rule.selector].length; i++) {
                switch(inputElement.type) {
                    case 'checkbox':
                    case 'radio':
                        errorMessage = rulesList[rule.selector][i](formElement.querySelector(rule.selector + ':checked'));
                        break;
                    default: errorMessage = rulesList[rule.selector][i](inputElement.value);
                }
                if(errorMessage) break;
            }

            if(errorMessage) {
                getParentElement(inputElement, option.formGroup).classList.add('invalid');
                messageElement.innerText = errorMessage;
            } else {
                inputElement.classList.remove('invalid');
                messageElement.innerText = '';
            }

            return errorMessage;
        }


        // Lặp để thêm các sự kiện cho các input
        option.rules.forEach(function(rule) {
            var inputElements = formElement.querySelectorAll(rule.selector);
            Array.from(inputElements).forEach(function(inputElement) {
                var messageElement = getParentElement(inputElement, option.formGroup).querySelector(option.message);
                if(inputElement) {
                    // Lấy ra hết tất cả test rule của input cho vào một mảng
                    if(Array.isArray(rulesList[rule.selector])) {
                        rulesList[rule.selector].push(rule.test)
                    } else {
                        rulesList[rule.selector] = [rule.test];
                    }

                    inputElement.onblur = function() {
                        validate(inputElement, messageElement, rule);
                    }

                    inputElement.onfocus = function() {
                        getParentElement(inputElement, option.formGroup).classList.remove('invalid');
                        messageElement.innerText = '';
                    }
                }
            })
            
        })

        formElement.onsubmit = function(e) {
            e.preventDefault()
            var isFormValid = true;
            // Lap qua cac rule de validate
            for(var i=0; i<option.rules.length; i++)  {
                var inputElement = formElement.querySelector(option.rules[i].selector);
                var messageElement = getParentElement(inputElement, option.formGroup).querySelector(option.message);
                if(validate(inputElement, messageElement, option.rules[i])) {
                    isFormValid = false;
                    break;
                } 
            }

            if(isFormValid) {
                if(typeof option.onSubmit == 'function') {
                    // Lay du lieu cua tata ca cac rules
                    var enableInputs = formElement.querySelectorAll('[name]')
                    var inputValues = Array.from(enableInputs).reduce(function(values, input) {
                        switch(input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default: values[input.name] = input.value;
                        }
                        
                        return values;
                    }, {})
                    option.onSubmit(inputValues)
                } else {
                    formElement.submit();
                 }
            }
        }
    }

}
Validator.isRequire = function (selector, message) {
    return {
        selector,
        test(value) {
            if(typeof value === 'string')
                return (value.trim() != '') ? undefined :message || 'Bạn phải nhập ô này trước';
            else
                return value != null ? undefined :message || 'Bạn phải nhập ô này trước';
        }
    }
}

Validator.isPhoneNumber = function(selector, message) {
    return {
        selector,
        test(value) {    
            var regex = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            return regex.test(value)? undefined : message || 'Vui lòng nhập đúng số điện thoại'
        }
    }
}

Validator.isEmail = function(selector, message) {
    return {
        selector,
        test(value) {    
            var regex = /^[^\s@]+@[^\s@]+$/;
            return regex.test(value)? undefined : message || 'Vui lòng nhập đúng email'
        }
    }
}



Validator.hasUser =function(seletor) {

}

Validator.isPassword = function(selector, message) {
    return {
        selector,
        test(value) {    
            var regex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            return regex.test(value)? undefined : 'Mật khẩu phải trên 8 kí tự, bao gồm chữ cái viết thường, viết hoa và chữ số!'
        }
    }
}

Validator.isConfirm = function(selector, getPassword, message) {
    return {
        selector,
        test(value) {
            return value === getPassword() ? undefined : message || 'Nhập lại chưa chính xác';
        }
    }
}

