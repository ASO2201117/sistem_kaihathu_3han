new Vue({
        el: '#app',
        data() {
            return{
            name: '',
            mailaddress: '',
            password:'',
            address:'',
            tel: ''
            };
        },
        computed: {
            isInValidName() {
            return this.name.length > 10;
            $count = 1;
            },
            isInValidMailaddress() {
            const regex = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
            return !regex.test(this.mailaddress);
            $count = 1;
            },
            isInValidPassword(){
            return this.password.length < 5;
            $count = 1;
            },
            isInValidTel() {
            const tel = this.tel;
            const isErr = tel.length < 8 || isNaN(Number(tel));
            return isErr;
            $count = 1;
        }
    }
});