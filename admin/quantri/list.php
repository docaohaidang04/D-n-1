<div class="content_1">
<table border="1">
        <tr>
            <th>STT</th>
            <th>TÊN DANH MỤC</th>
            <th>Số LƯỢNG</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
        </tr>
        <?php 
        foreach ($listthongke as $thongke) {
          extract($thongke);
          echo '<tr>
                    <td>'. $madm.'</td>
                    <td>'.$tendm.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.number_format($maxprice, 0, ",", ".") .'</td>
                    <td>'.number_format($minprice, 0, ",", ".") .'</td>
                    <td>'.number_format($avgprice, 0, ",", ".") .'</td>
               </tr>';
        }
        ?>
 </table>
 <div class="chart-container"><a href="admin.php?pg=bieudo">Biểu đồ</a></div>
 </div>

 <style>
     .content_1{
          display: flex;
          flex-direction: column;
     }
     .chart-container{
          margin: 0 auto;
          border: 1px solid grey;
          width: 80px;
          text-align: center;
          color: black;
          background-color: grey;
          border-radius: 20px;
     }
     .chart-container a{
          color:red;
     }
     .chart-container:hover{
          background-color: white;
          border: 1px solid black;

     }
     
 </style>