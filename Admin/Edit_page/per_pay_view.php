
<div class="update_empin"> 
        <?php include '../common/connection.php';
        $monthar=array("","January","February","March","April","May","June","July","August","September","October","November","December");?>
        <div class="update_form">
            <?php 
            $data=$_GET['id'];
            $emp_query=$con->query("SELECT Rf_id FROM employee_details WHERE Emp_id='$data'");
            $emp_row=$emp_query->fetch_array();
            $rf=$emp_row["Rf_id"];
            ?>
            <div  style="width: 110%" class="emp_details_view">
                <div class="header_view">
                <?php echo "<a href='?page=View_details&id=$data'>X</a>"; ?>
                    <h1 style="width: 60%">Attendance of the Employee</h1>
                    <div></div>
                </div>
                <div  style="border: none; margin-top:0px" class="per_att">
                    <div style="height:90%; width:98%;" class="per_att_table">
                    <table >
                            <thead>
                                <th>Date</th>
                                <th>Worked Hours</th>
                                <th>Overtime Hours</th>
                                <th>Total salary</th>
                                <th>Status</th>
                            </thead>
                            <tbody id="tabledata">
                                <?php
                                        $sql="SELECT *
                                        FROM salary_paid
                                        INNER JOIN overtime_details ON salary_paid.Month_id = overtime_details.Month_id AND salary_paid.Emp_id = overtime_details.Emp_id WHERE salary_paid.Emp_id='$data' ORDER BY salary_paid.Month_id DESC;";
                                        $query = $con->query($sql);
                                    if($query->num_rows)
                                    {
                                        $i=1;
                                        while($row = $query->fetch_assoc())
                                        {
                                            $monthdata = substr($row['Month_id'], 4, 2);
                                            $yeardata = substr($row['Month_id'], 0, 4);
                                            $monthdata = intval($monthdata);
                                ?>
                                <tr >
                                    <td><?php echo $monthar[$monthdata]." ".$yeardata; ?></td>
                                    <td><?php echo $row['Working_hour']." hrs"; ?></td>
                                    <td><?php echo $row['Overtime_hrs']." hrs"; ?></td>
                                    <td><?php echo "₹ ".$row['Total_salary']; ?></td>
                                    <td><?php echo ($row['Salary_status']==1)? "<p style='color: rgb(13, 255, 0);'>PAID</p>":"<p style='color: red; font-weigth:none;'>PENDING</p>"; ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                     else
                                    {
                                ?>
                                <tr>
                                    <td colspan="9">
                                        NO DATA
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>           
        </div>
    </div>