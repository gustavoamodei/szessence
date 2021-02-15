       

    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <br><br>
    <footer>
      <p class="text-center">  @SZessence</p>
    </footer>
        </body>
  
</div> <!-- container-->  
    <style>


          footer{
              background-color: #42f5b9;
              display: block;
              position: fixed;
              bottom:0;
              left:0;
              width: 100%;
              height: 5%;
              color: black;
              
          }
      </style>
</html>
<script>
$(document).ready(function(){
 
  $('#money').mask('000.000.000.000.000,00', {reverse: true});
  $('#money2').mask("#.##0,00", {reverse: true});
  $('#celular').mask('(00) 00000-0000');
});
</script>
