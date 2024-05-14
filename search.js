// $(document).ready(function() {
//     $("#live_search").keyup(function() {
//         var input = $(this).val()
//         // alert(input)
//         if(input != "") {
//             $.ajax({
//                 url: "liveSearch.php",
//                 method: "POST",
//                 data: {input:input},
//                 success: function(data) {
//                     $("#search_result").html(data)
//                     $("#search_result").css("display", "block")
//                 }
//             })
//         }
//         else {
//             $("#search_result").css("display", "none")
//         }
//     })
// })