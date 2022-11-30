<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Авторизация</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Домашняя</a></li>
						<li class="breadcrumb-item active" aria-current="page">Авторизация</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Вы еще не зарегистрированы?</h4>
						<p>Тогда перейдите на страницу регистрации</p>
						<a class="button button-account" href="/register">Зарегистрироваться</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Авторизация</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'" required>
						</div>
						<p id="info" style="color: red; padding-left: 1.5rem"></p>

						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" name="selector" required>
								<label for="f-option2">Согласен на обработку персональных данных</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" class="button button-login w-100">Войти</button>
							<a href="#">Забыли пароль?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->

<!-- Модальное окно -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Вы успешно авторизованы.
				</h5>
			</div>
			<div class="modal-body">
				Добро пожаловать в личный кабинет.
			</div>
		</div>
	</div>
</div>


<script>
	async function sendForm(form) {
		info.innerText = "";
		let formData = new FormData(form);

		let response = await fetch("authUser", {
			method: "POST",
			body: formData,
		});
		let res = await response.json();

		if (res.result == "exist") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "lk";
			}, 3000);
		} else if ((res.result == "notFound")) {
			info.innerText = "Такого пользователя не существует!";
		}
	}
</script>