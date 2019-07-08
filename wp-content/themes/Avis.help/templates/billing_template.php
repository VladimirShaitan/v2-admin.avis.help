<?php 
/*Template Name: Billing page*/
// print_r($post->ID); 
get_header('account');  ?>

  <div class="row m-0">
    <div class="col-5 p-0">
      <!-- <div class="row m-0"> -->
        <!-- <div class="col-6 p-0"> -->
            <div class="acc-home-wrapper billing-page-wrapper">
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>Bill</th>
                    <th>Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-row-id="1">
                    <td class="table_info_trigger">Bill #1 <img src="/wp-content/uploads/2019/02/bill_arr.png"></td>
                    <td>15.01.19</td>
                    <td><span class="text-success">Paid</span></td>
                  </tr>
                  <tr class="" data-parent-row-id="1">
                    <td colspan="3" > 
                      <!-- class="p-0" -->
<!--                       <table class="table table-borderless text-left">
                        <tbody>
                          <tr>
                            <td>Branch</td>
                          </tr>
                           <tr>
                            <td>Sms</td>
                          </tr>
                        </tbody>
                      </table> -->


                        <ul class="list-unstyled text-left">
                          <li>Branch</li>
                          <li>Sms</li>
                        </ul>
                    </td>
                  </tr>

                  <tr data-row-id="2">
                    <td class="table_info_trigger">Bill #2 <img src="/wp-content/uploads/2019/02/bill_arr.png"></td>
                    <td>13.01.19</td>
                    <td><span class="text-success">Paid</span></td>
                  </tr>
                  <tr class="related" data-parent-row-id="2">
                    <td colspan="3">
                        <ul class="list-unstyled text-left">
                          <li>Branch</li>
                          <li>Sms</li>
                        </ul>
                    </td>
                  </tr>

                  <tr data-row-id="3">
                    <td class="table_info_trigger">Bill #3 <img src="/wp-content/uploads/2019/02/bill_arr.png"></td>
                    <td>10.01.19</td>
                    <td><span class="text-danger">Unpaid</span></td>
                  </tr>
                  <tr class="related" data-parent-row-id="3">
                    <td colspan="3">
                        <ul class="list-unstyled text-left">
                          <li>Branch</li>
                          <li>Sms</li>
                        </ul>
                    </td>
                  </tr>


                </tbody>
              </table>
          </div>
        <!-- </div> -->


      <!-- </div> -->
      </div>

  </div>

<?php get_footer('account'); ?> 