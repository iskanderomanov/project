require('./bootstrap');
const {forEach} = require("lodash");

window.Vue = require('vue').default;



Vue.component('component-domains', require('./components/Domains.vue').default);



let responseDomains = []
const app = new Vue({
    el: '#app',
    data() {
        return {
            text: '',
            domains: [{}],
        }
    },
    methods: {
        async mainFunc(e) {
            this.domains = [{}]
            let vm = this;
            console.log(vm)
            if (this.text.includes('\n')){
                let domainArray = this.text.split('\n')
            }
            let domainArray = this.text.split(',')

            domainArray.map(function (value, key) {
                axios.post(
                    '/domain',
                    {domain: value}
                ).then((response) => {
                    vm.domains.push(response.data)

                    console.log(vm.domains)

                    responseDomains.push(response.data);
                    // console.log(responseDomains, '1231123')
                })
            })
            // console.log(this.domains);
        }
    },
    watch: {}
});

let request = function (value) {

}
let renderTable = function () {

}
