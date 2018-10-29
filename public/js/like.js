var proposalId = 0;

$('.approve').on('click', function(event){
	event.preventDefault();
	proposalId = event.target.parentNode.parentNode.dataset['proposalid'];
	console.log(proposalId);
	var isApprove = event.target.previousElementSibling == null;
	

	$.ajax({
		method : 'POST',
		url : urlApprove,
		data: {isApprove: isApprove, proposalId: proposalId, _token: token},
	}).done(function () {
	

		event.target.innerText = isApprove ? event.target.innerText == 'Approve' ? 'You approved this proposal' : 'Approve' : event.target.innerText == 'Disapprove' ? 'You dont approve this post' : 'Disapprove' ;

		if (isApprove) {
			event.target.nextElementSibling.innerText = 'Disapprove';
		}
		else {
			event.target.previousElementSibling.innerText = 'Approve';
		}
	});
	
});