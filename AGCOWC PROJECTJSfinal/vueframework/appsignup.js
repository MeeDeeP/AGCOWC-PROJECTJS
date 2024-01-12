new Vue({
        el: '#sign-up',
        data: {
            formData: {
                fname: '',
                lname: '',
                bdate: '',
                gender: 'Male',
                conum: '',
                email: '',
                username: '',
                password: '',
                confirm_password: '',
                profile_photo: null,
            }
        },
        methods: {
            submitForm: function() {
                // You can perform any validation here before making the API request

                // Assuming you are using FormData to handle file uploads
                let formData = new FormData();
                for (let key in this.formData) {
                    formData.append(key, this.formData[key]);
                }

                // Make API request using Axios or Fetch
                // Example using Axios:
                // axios.post('register_query.php', formData)
                //     .then(response => {
                //         // Handle success
                //     })
                //     .catch(error => {
                //         // Handle error
                //     });

                // Example using Fetch:
                // fetch('register_query.php', {
                //     method: 'POST',
                //     body: formData
                // })
                //     .then(response => response.json())
                //     .then(data => {
                //         // Handle success
                //     })
                //     .catch(error => {
                //         // Handle error
                //     });
            }
        }
    });
