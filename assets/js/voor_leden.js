import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.esm.browser.js'

var app = new Vue({
    el: '#sold',
    data () {
        return {
            info : "Aan het laden"
        }
    },
    mounted () {
        axios
          .get('theater-oana.be/API/SellCount.php')
          .then(response => (this.info = response.sold))
      }
})