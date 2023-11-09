<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>웹 해킹 실습</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/pricing.css" rel="stylesheet">
	
	<style>
		/* Add padding to the .card class */
		.card {
			padding: 20px;
		}
    </style>
	
	<script>
        var check = 0;
		function check_input() {
            if (!document.member.id.value) {
                alert("아이디를 입력하세요!");
                document.member.id.focus();
                event.preventDefault(); // 입력폼 전송 방지
            }
			if(!document.member.pw.value){
				alert("비밀번호를 입력하세요!");
				document.member.pw.focus();
				event.preventDefault();
			}
			if(!document.member.pw_confirm.value){
				alert("비밀번호 확인을 입력하세요!");
				document.member.pw_confirm.focus();
				event.preventDefault();
			}
			if(document.member.pw.value != document.member.pw_confirm.value){
				alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
				document.member.id.focus();
				document.member.pw.select();
				event.preventDefault();
			}
            if(check == 0){
                alert("아이디 중복 체크를 해주세요!");
                event.preventDefault();
            }
			//document.member.submit();
		}
		function reset_form() {
			document.member.id.value="";
			document.member.pw.value="";
			document.member.pw_confirm.value="";
			document.member.id.focus();
            event.preventDefault();
		}
		function check_id() {
			// 사용자 아이디를 가져오고 URL에 추가
			var userId = document.member.id.value;
			if (!userId) {
				alert("아이디를 입력하세요!");
				event.preventDefault();
			}
			// 중복 체크 페이지를 열 때 아이디를 URL 매개변수로 전달
            check = 1;
			window.open("check_id.php?id=" + userId,
				"IDcheck",
				"left=700,top=300,width=380,height=160,scrollbars=no,resizable=yes");
		}
	</script>
    </head>
    <body>
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
            </svg>&nbsp;&nbsp;
            <h5 class="my-0 mr-md-auto font-weight-normal">seKUrity</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php">Home</a>
                <a class="p-2 text-dark" href="about.php">About</a>
                <a class="p-2 text-dark" href="board.php">Board</a>
                <a class="p-2 text-dark" href="members.php">Members</a>
            </nav>
            <a class="btn <?php if(isset($_COOKIE["user_id"])) { echo "btn-outline-danger"; } else { echo "btn-outline-success"; } ?>" href="<?php if(isset($_COOKIE["user_id"])) { echo "cookie_logout.php"; } else { echo "login.php"; } ?>">
                <?php if(isset($_COOKIE["user_id"])) { echo "Logout"; } else { echo "Login"; } ?>
            </a>
        </header>

        <!-- Sign up Form -->
		<main class="form-signin text-center container" style="max-width: 450px; margin: 0 auto;">
			<form name="member" method="POST" action="member_join.php">
                <br><br>
				<img class="mb-4" src="img/seKUrity.png" alt="" width="50%" height=auto>
				<div class="card">
                    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
					<div class="form-floating">
						<div style="float: left">아이디</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </span>
                            <input type="text" name="id" class="form-control" id="floatingInput" placeholder="아이디">
							<button class="input-group-text" type="button" onclick="check_id()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg>
							</button>
						</div>
                        <label for="floatingInput"></label>
                    </div>
					<div class="form-floating">
						<div style="float: left">비밀번호</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
									<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
								</svg>
                            </span>
                            <input type="password" name="pw" class="form-control" id="floatingInput" placeholder="비밀번호">
                        </div>
                        <label for="floatingInput"></label>
                    </div>
					<div class="form-floating">
						<div style="float: left">비밀번호 확인</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
								  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
								  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
								</svg>
                            </span>
                            <input type="password" name="pw_confirm" class="form-control" id="floatingInput" placeholder="비밀번호 확인">
                        </div>
                        <label for="floatingInput"></label>
                    </div>
					<br>
					<div class="btn-group d-flex justify-content-center">
                        <button class="btn btn-primary" onclick="check_input()">저장하기</button>
                        <button class="btn btn-secondary" onclick="reset_form()">취소하기</button>
                    </div>
                </div>
			</form>
		</main>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="./js/jquery-slim.min.js"><\/script>')</script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
            });
        </script>
    </body>
</html>
