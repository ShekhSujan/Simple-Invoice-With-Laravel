
<style>
    .invoice-container .invoice-header .invoice-logo img {
      max-width: 150px;
      color: #000000 !important;
    }
    .title-noborupa{
      color:#074694;
    }
    .logo-title{
      background-color:#b9e2c2;
      padding: 10px 0px 30px 0px;
    }
    .invoice-1{
      padding-top: 8px;
      text-align: center;
    }
    .invoice-2{
      font-weight: 700;
      border: 2px solid;
      display: inline-block;
      padding: 1px 20px 1px 20px;

    }
    .invoice-terms{
      font-size: 12px;
    }
    .hst{
      font-size: 16px;
      font-weight: 700;
      float: right;
    }
    .invoice-footer-link{
      font-weight: 600;
    }
    .invoice-footer{
      background-color:#b9e2c2;
      padding: 10px 15px 10px 15px;
    }
    .table td {
      border-top: 1px solid #d3d9e0;
      vertical-align: middle;
      padding: .65rem .65rem;
    }
    </style>
    <script>
    $(document).ready(function(){
      var count = 1;
      dynamic_field(count);
      function dynamic_field(number)
      {
        html = '<tr>';
        html += '<td><input type="text" class="Items" name="serial_no[]" value=""/></td>';
        html += '<td><input type="text" class="Product " name="product[]" value=""/></td>';
        html += '<td><input type="text" class="Quantity" name="single_qty[]" value=""/></td>';
        html += '<td><input type="text" class="Rate" name="unit_price[]" value=""/></td>';
        html += '<td><input type="text" class="Amount" name="amount[]" value=""/></td>';
        if(number > 1)
        {
          html += '<td><button type="button" name="remove" id="" class="btn btn-danger btn-sm remove"><span class="icon-circle-with-cross"></span></button></td></tr>';
          $('tbody').append(html);
        }
        else
        {
          html += '<td><button type="button" name="add" id="add" class="btn btn-primary btn-sm"><span class="icon-plus1"></span></button></td></tr>';
          $('tbody').html(html);
        }

      }

      $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
      });

      $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
      });

    });
    </script>
    <script>
    // Execute once document is ready.
    $(function () {
      $("table").on("click", ".del", function () {
        // Remove the parent TR tag completely from DOM.
      if($(this).closest("tr").remove()){
      }

      });
      // Attach input change event handler on table, which listens for clicks on input.
      $("table").on("input", "input", function () {
        // For every row...
        $("tbody tr").each(function () {
          // Cache the value of the current row.
          $this = $(this);
          // Do this only if this is not the master row.
          if (this.id != "master")
          // Set the value of .Amount here (making sure you set it to integer multiplying two values).
          $this.find(".Amount").val(+$this.find(".Quantity").val() * +$(this).find(".Rate").val());
          // Set the totals to 0.
          $("#total_amt, #total_qty").text(0);
          // For every .Amount, collect the values and sum it and add it to #total_amt unless it's empty.
          $(".Amount").each(function () {
            if (this.value != "")
            $("#total_amt").text(parseInt($("#total_amt").text()) + parseInt($(this).val()));
            //Input Field total
            var total=parseInt($("#total_amt").text());
            $(".total_amt").val(total);
          });
          // For every .Quantity, collect the values and sum it and add it to #total_qty unless it's empty.
          $(".Quantity").each(function () {
            if (this.value != "")
            $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
            //quantity Input field
            var qty=parseInt($("#total_qty").text());
            $(".total_qty").val(qty);

          });

          $(".Amount").each(function () {
            if (this.value != "")
            $("#total_tax").text(parseInt($("#total_amt").text())*13/100);
            //Tax Input Field
            var tax=parseInt($("#total_tax").text());
            $(".total_tax").val(tax);
            //
            $("#total_sub").text(parseInt($("#total_amt").text())+parseInt($("#total_tax").text()));
            //Subtotal Input field
            var subtotal=parseInt($("#total_sub").text());
            $(".total_sub").val(subtotal);
          });

        });
      });
    });
    </script>
