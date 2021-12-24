<?php
  $providers = [];

  foreach($val as $col => $value) 
        {
            if(!in_array($value['provider'], $providers))
                    {
                        array_push($providers, $data['button'] = $value['provider']);
                    }
        }  
?>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<table >
    <tbody>
        <tr>
            <th>Sort by:</th>
               
                <?php         
                    foreach($providers as $provider)
                    {
                        ?>
                         <th>
                        <button onclick="sortByProvider('<?php echo $provider ?>')" value="<?php echo $provider ?>"><?php echo $provider ?></button>
                        </th> 
                        <?php
                        
                    }      
                ?> 
                 
            </th>
        </tr>
          
    </tbody>
</table>
<table >
    <tbody>
    
    </tbody>
</table>


<table id="table" style="width: 100%;"> 
<thead>
        <tr>
          <th>Date</th>   
            <th>Email</th> 
            <th>Provider</th>         
            <th>Action</th>
            <th>
                <button onclick="exportToCsvFile()">Create CSV file</button>
                <hr>
                <form method="get" action="/emails.csv">
                    <button type="submit">Download CSV file</button>
                </form>
            </th>
        </tr> 
</thead> 
    <tbody id="body"> 

            <?php
            $counter = 0;
            foreach($val as $col => $value) 
            { 
                
            ?>  
            <tr class="<?php echo $value['provider'] ?> row"  id="<?php echo $counter?>">
                
                <td> <?php echo $value['date'] ?> </td>
                <td> <?php echo $value['email'] ?> </td>
                <td> <?php echo $value['provider'] ?> </td>  
                <td><button  onclick="deleteRow(<?php echo $value['id'] ?>)">delete</button></td>
                <td><input type="checkbox" class="emailCheckbox" name="mycheckboxes" id="<?php echo $value['id'] ?>"></td>
            </tr>
            <?php
                $counter = $counter + 1;
              } 
            ?>
    </tbody>
             
</table>
<br>

    <div style="display: flex; justify-content: space-around;">
        <div>
            <button id="buttonBack" onclick="showPrevious10rows()">back</button>
        </div>
        <div id="pages">
            <span><?php echo $counter ?></span>
        </div>
        <div>
            <button id="buttonNext" onclick="showNext10rows()">next</button>
        </div>
    </div>
            
<script src="./../public/JsScripts/sortingPaginationCVS.js"></script>
