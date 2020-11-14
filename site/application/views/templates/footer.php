</main>

<!-- Modal IN-->
<div class="modal fade" id="staticAuth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticAuthpLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticAuthpLabel">Авторизоваться</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAuth">
          <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="login">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="button" class="btn btn-primary btn-lg btn-block">Войти</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal REG-->
<div class="modal fade" id="staticRegister" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticRegisterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticRegisterLabel">Зарегистрироваться</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row pb-2">
            <div class="col">
              <input type="text" class="form-control" placeholder="Name" id="name">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Login" id="login">
            </div>
          </div>
          <div class="row pb-2 ml-4">
            <div class="col">
              <div class="form-group form-inline">
                <label for="inputEmail3" >Email</label>
                <div class="col">
                  <input type="email" class="form-control mx-sm-3" id="inputEmail" placeholder="exsample@any.any">
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group form-inline">
                <label for="inputEmail" >телефон</label>
                <div class="col-7">
                  <input type="email" class="form-control mx-sm-3" id="inpuPhone" placeholder="+79999999999">
                </div>
              </div>
            </div>
            </div>
            <div class="row pb-2 ml-4">
              <div class="col" style="padding-right: 0;">
                <div class="form-group form-inline">
                  <label for="inputPassword6">Пароль</label>
                  <input type="password" id="inputPassword" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                </div>
              </div>
              <div>
                <div class="form-group form-inline">
                  <label for="inputPassword6">Повторите пароль</label>
                  <input type="password" id="inputPasswordAgaun" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                </div>
              </div>
          </div>
          <div class="form-group form-check text-center">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ознакомился с политикой конфинциальности</label>
          </div>
          <button type="button" class="btn btn-primary btn-lg btn-block">Зарегестрироваться</button>
        </div>
      </form>
    </div>

  </div>
</div>
</div>
</body>
</html>