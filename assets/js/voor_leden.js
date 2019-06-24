
var app = new Vue({
    el: '#sold',
    data () {
        return {
            ticketsSold : "Aan het laden"
        }
    },
    mounted () {
        axios
          .get('API/SellCount.php')
          .then(response => (this.ticketsSold = response.sold))
      }
})