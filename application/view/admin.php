<?php
require_once dirname(__FILE__).'/common/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                        <th scope="col">Логин</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Действие</th>
                        
                      </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $key => $entry){ ?>
                    <tr id="<?php echo "row-".$entry['id']; ?>">
                        <td><?php echo $entry['id']?></td>
                        <td><?php echo $entry['username']?></td>
                        <td><?php echo $entry['email']?></td>
                        <td>
                            <button class="btn btn-warning" onclick="getUser(<?php echo $entry['id']; ?>)">
                                Редактировать
                            </button>
                            <button class="btn btn-danger" onclick="removeUser(<?php echo $entry['id']; ?>)">
                                Удалить
                            </button>
                            
                        </td>
                    </tr>
                    <?php } ?> 
                    
                </tbody>
                
            </table>
            
            <button class="btn btn-success" id="button-add-user" onclick="javascript:$('#addUserModal').modal();">
                Добавить
            </div>
           
           
            
        </div>
    </div>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="form-add-user" action="/index.php?route=admin/add">
              <div class="modal-body">
                  <div class="form-group">
                       <input type="text" class="form-control" name="username" id="username" placeholder="Логин" required>
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Имя" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Фамилия" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" >
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" >  
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="groupid" id="groupid" placeholder="Group ID" >  
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                <button type="button" onclick="addUser('form-add-user')" class="btn btn-success">Сохранить</button>
              </div>
        </form>
      
    </div>
  </div>
</div>
<!--Edit user modal-->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="form-edit-user" action="javascript:void(null)">
              <div class="modal-body">
                  <div class="form-group">
                       <input type="text" class="form-control" name="username" id="username" placeholder="Логин" required>
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Имя" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Фамилия" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" >
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" >  
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="groupid" id="groupid" placeholder="Group ID" >  
                  </div>
                  <input type="hidden" id="userid" name="userid">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                <button type="button" onclick="editUser('form-edit-user')" class="btn btn-success">Сохранить</button>
              </div>
        </form>
      
    </div>
  </div>
</div>
   
<?php
require_once dirname(__FILE__).'/common/footer.php';
?>