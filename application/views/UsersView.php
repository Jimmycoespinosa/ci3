<body>
    <div class="container">
        <!-- IMPLEMENTACIÓN FORM HELPER EN FORMS -->
        <?php
            $Frm_atributos = array('method'=>'post', 'action'=>'saveUser');
            $div_principal = "<div class='row justify-content-center alig-items-center' border=1>";            
            $div_inicio = "<div class='form-group col-lg-4'>";
            $div_btns = "<div class='d-flex align-items-center toolbar'>";
            $div_cierre = "</div>";

            echo form_open('saveUser', $Frm_atributos);
                echo $div_principal;
                    echo $div_inicio;
                    echo form_label("Nombre");            
                    echo form_input(array('type'=>'text', 'name'=>'name', 'required'=>'true', 'class'=>'form-control'));
                    echo $div_cierre;

                    echo $div_inicio;
                    echo form_label("Email");            
                    echo form_input(array('type'=>'text', 'name'=>'email', 'required'=>'true', 'class'=>'form-control'));
                    echo $div_cierre;

                    echo $div_btns;
                    echo form_submit(array('value'=>'Guardar', 'class'=>'btn btn-primary', 'style'=>'margin-right: 10px'));
                    echo form_reset(array('value'=>'Cancelar', 'class'=>'btn btn-danger'));
                    echo $div_cierre;
                echo $div_cierre;
            echo form_close();
        ?>
        <!-- FIN IMPLEMENTACIÓN FORM HELPER EN FORMS -->
        <!-- <form class="post" action="<?php //echo base_url();?>saveUser">
            <div class="row justify-content-center alig-items-center" border=1>
                <div class="form-group col-lg-4">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" required=true>
                </div>
                <div class="form-group col-lg-4">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required=true>
                </div>
                <div class="d-flex align-items-center toolbar">
                    <input type="submit" class="btn btn-primary" name="" value="Guardar" style="margin-right: 10px">
                    <input type="reset" class="btn btn-danger" value="Cancelar">
                </div>
                <br>
            </div>
            <div class="row"> -->
                <table class="table">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">code</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">created_at</th>
                        <th scope="col">update_at</th>
                        <th scope="col">deleted_at</th>
                        <th scope="col">acciones</th>
                    </tr>
                    <?php
                    foreach($users as $user){
                        echo "<tr scope='row'>";
                        echo "<td>".$user->id."</td>";
                        echo "<td>".$user->code."</td>";
                        echo "<td>".$user->name."</td>";
                        echo "<td>".$user->email."</td>";
                        echo "<td>".$user->created_at."</td>";
                        echo "<td>".$user->update_at."</td>";//BD= on update CURRENT_TIMESTAMP	
                        echo "<td>".$user->deleted_at."</td>";
                        echo "<td>";                
                    ?>
                        <a href="<?php echo base_url();?>editUser/<?php echo $user->id; ?>" class="btn btn-warning" 'role="button" ><i class="bi bi-pencil-square"></i></a>
                        <a href="<?php echo base_url();?>deleteUser/<?php echo $user->id; ?>" class="btn btn-danger" 'role="button" ><i class="bi bi-trash"></i></a>
                    <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>                
                </table>
                <!-- IMPLEMENTACIÓN PAGINACIÓN -->
                <nav aria-label="...">
                    <ul class="pagination">
                        <?php
                            $prev = $current_page-1;
                            $next = $current_page+1;
                            if($prev <= 0){
                                $prev = 1;
                            }
                            if($next >= $last_page){
                                $next = $last_page;
                            }                            
                        ?>
                        <?php if($current_page <= 1){?>
                            <li class="page-item disabled">
                        <?php }?>
                        <a class="page-link" href="<?php echo base_url().'index/'.$prev;?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for($i=1; $i <= $last_page; $i++){?>
                            <?php if($i == $current_page){?>
                                <li class="page-item active">
                                <a class="page-link" href="<?php echo base_url().'index/'.$i;?>"><?php echo $i;?><span class="sr-only">(current)</span></a>
                            <?php }else{?>
                                <li class="page-item"><a class="page-link" href="<?php echo base_url().'index/'.$i;?>"><?php echo $i;?></a></li>                            
                            <?php }                           
                        }?>
                        </li>
                        <?php if($current_page >= $last_page){?>
                            <li class="page-item disabled">
                        <?php }else{?>
                            <li class="page-item">
                        <?php }?>
                        <a class="page-link" href="<?php echo base_url().'index/'.$next;?>">Next</a>
                        </li>
                    </ul>
                </nav>
        <!-- </div>        
        </form> -->
    </div>
</body>
</html>