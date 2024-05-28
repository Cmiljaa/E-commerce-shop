let config = {
    'name':{
        required: true,
        minlength: 3,
        maxlength: 50
    },

    'username':{
        required: true,
        minlength: 5,
        maxlength: 50
    },

    'email':{
        required: true,
        email: true,
        minlength: 5,
        maxlength: 50
    },

    'password':{
        required: true,
        minlength: 7,
        maxlength:25,
    }
}

let Validator1 = new Validator(config);