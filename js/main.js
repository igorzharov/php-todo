$(function () {
	$(".open-popup").magnificPopup({
		type: "inline",

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: "auto",

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: "my-mfp-zoom-in",
	});

	$(".open-popup").click(function () {

		$('.form-edit-post .post-status i').removeClass('status-true status-false')

		$post = $(this).parent().parent();

		$id = $post.attr('data-post-id');
		$text = $post.attr('data-post-text');
		$mark = $post.attr('data-post-mark');

		$('.form-edit-post input[name=id]').val($id);
		$('.form-edit-post textarea').val($text);
		$('.form-edit-post input[name=mark]').val($mark);

		($mark == 1) ? $('.form-edit-post .post-status i').addClass('status-true') : $('.form-edit-post .post-status i').addClass('status-false')

	})

	$('.post-status').click(function () {
		$('.post-status i').removeClass('status-true status-false')
		if ($(this).parent().find('input[name=mark]').val() == 1) {
			$('.post-status i').addClass('status-false')
			$(this).parent().find('input[name=mark]').val('0')
		}
		else {
			$('.post-status i').addClass('status-true')
			$(this).parent().find('input[name=mark]').val('1')
		}
	})

	// $(".open-popup").click(function () {
	// 	$('.form-edit-post .h3').html($(this).parent().parent().attr("data-post-user"))
	// 	$('.form-edit-post textarea').val($(this).parent().parent().attr("data-post-text"))
	// 	$('.form-edit-post input[name="user"]').val($(this).parent().parent().attr("data-post-user"))
	// 	$('.form-edit-post input[name="mark"]').val($(this).parent().parent().attr("data-post-mark"))
	// 	$('.form-edit-post .post-status').attr("data-post-mark", $(this).parent().parent().attr("data-post-mark"))
	// 	$('.form-edit-post .post-status i').removeClass('status-true')
	// 	$('.form-edit-post .post-status i').removeClass('status-false')
	// 	if ($(this).parent().parent().attr("data-post-mark") == '1') {
	// 		$('.form-edit-post .post-status i').addClass('status-true')
	// 	}
	// 	else {
	// 		$('.form-edit-post .post-status i').addClass('status-false')
	// 	}
	// })

	// $('.post-status').on("click", function () {
	// 	$(this).find('i').removeClass('status-true')
	// 	$(this).find('i').removeClass('status-false')
	// 	if ($(this).attr("data-post-mark") == '1') {
	// 		$(this).attr("data-post-mark", "0")
	// 		$('.form-edit-post input[name="mark"]').val('0')
	// 		$(this).find('i').addClass('status-false')
	// 	}
	// 	else {
	// 		$(this).attr("data-post-mark", "1")
	// 		$('.form-edit-post input[name="mark"]').val('1')
	// 		$(this).find('i').addClass('status-true')
	// 	}
	// })

	$(".form-sign-in").submit(function () {
		$.ajax({
			type: "POST",
			url: "signin.php",
			data: $(".form-sign-in").serialize(),
			success: function (response) {
				if (response == "success") {
					document.location.reload();
				} else {
					$("#sign-in .message").html("Неверный логин или пароль!");
				}
			},
		});
		return false;
	});
});
