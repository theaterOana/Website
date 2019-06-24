
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
          .then(response => {
            console.log(response.data.sold);
            console.log(response)
            this.ticketsSold = response.data.sold}
            )
      }
})