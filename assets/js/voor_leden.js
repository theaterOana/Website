
var app = new Vue({
    el: '#sold',
    data () {
        return {
            sold : "Aan het laden"
        }
    },
    mounted () {
        axios
          .get('theater-oana.be/API/SellCount.php')
          .then(response => (this.sold = response.sold))
      }
})