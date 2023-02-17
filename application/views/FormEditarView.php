<div class="container">
    <!-- IMPLEMENTACIÓN FORM HELPER EN FORMS -->
    <?php
        $Frm_atributos = array('method'=>'post', 'action'=>'updateUser');
        $div_principal = "<div class='row justify-content-center alig-items-center' border=1>";            
        $div_inicio = "<div class='form-group col-lg-3'>";
        $div_btns = "<div class='d-flex align-items-center toolbar'>";
        $div_cierre = "</div>";

        echo form_open('updateUser', $Frm_atributos);
            echo $div_principal;
                echo $div_inicio;
                echo form_label("Id");            
                echo form_input(array('type'=>'text', 'name'=>'id', 'required'=>'true', 'class'=>'form-control w-20 p-3', 'value'=>$user->id));
                echo $div_cierre;

                echo $div_inicio;
                echo form_label("Codigo");            
                echo form_input(array('type'=>'text', 'name'=>'code', 'required'=>'true', 'readonly'=>'true', 'class'=>'form-control', 'value'=>$user->code));
                echo $div_cierre;

                echo $div_inicio;
                echo form_label("Nombre");            
                echo form_input(array('type'=>'text', 'name'=>'name', 'required'=>'true', 'class'=>'form-control', 'value'=>$user->name));
                echo $div_cierre;

                echo $div_inicio;
                echo form_label("Email");            
                echo form_input(array('type'=>'text', 'name'=>'email', 'required'=>'true', 'class'=>'form-control', 'value'=>$user->email));
                echo $div_cierre;

                echo $div_btns;
                echo form_submit(array('value'=>'Actualizar', 'class'=>'btn btn-primary', 'style'=>'margin-right: 10px'));
                echo form_submit(array('value'=>'Cancelar','name'=>'Cancelar', 'class'=>'btn btn-danger'));
                echo $div_cierre;
            echo $div_cierre;
        echo form_close();        
    ?> 
    <!-- IMPLEMENTACIÓN FORM HELPER EN FORMS -->
    
    <!-- <form class="post" action="<?php //echo base_url();?>updateUser">
        <div class="row justify-content-center alig-items-center" border=1>
        <div class="form-group col-lg-4">
            <label>Id</label>
            <input type="text" readonly="true" name="id" class="form-control" value="<?php //echo $user->id;?>">
        </div>
        <div class="form-group col-lg-4">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required=true value="<?php //echo $user->name;?>">
            </div>
            <div class="form-group col-lg-4">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required=true value="<?php //echo $user->email;?>">
            </div>
            <div class="d-flex align-items-center toolbar">
                <input type="submit" class="btn btn-primary" name="" value="Actualizar" style="margin-right: 10px">
                <button class="btn btn-danger" onclick="<?php //base_url();?>">Cancelar</button>
            </div>
            <br>
        </div>     
    </form> -->
</div>
