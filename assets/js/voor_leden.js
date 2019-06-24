
var app = new Vue({
    el: '#sold',
    data () {
        return {
            sold : "Aan het laden"
        }
    },
    mounted () {
        this.$http.get('theater-oana.be/API/SellCount.php', function(data, status, request){
            if(status == 200)
            {
              this.sold = (JSON.parse(data)).sold;
            }
          });
      }
})