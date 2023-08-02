        <td colspan="2" class="ps-5 pe-5">
          <h3 class="mt-3 fw-bold" style="color: #056290;">
            LOGIN
            <hr class=" border border-primary opacity-50" style="margin-top: .25rem;">
          </h3>
          <div style="width: 270px; height: 360px;">
            <form action="<?= base_url("/login/authorization"); ?>" method="post">
              <div class="mb-3 input-group">
                <span class="input-group-text">
                  <i class="fa-solid fa-user fa-xl" ></i>
                </span>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa-solid fa-lock fa-xl"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary" style="width: 270px; height: 40px; font-size: 12px;">LOGIN</button>
            </form>
          </div>
        </td>