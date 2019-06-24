
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