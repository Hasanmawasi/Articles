const articlePage={};
articlePage.base_url = "http://localhost/Articles/Articles-Server/users/v1/";

articlePage.loadFor = function (pageName){
    eval("articlePage.load_"+pageName+"()");
}
// post data using axios
articlePage.post_data =async function(url,data){
    try {
      const response=await  axios.post(url, data);
      return response.data;
    } catch (error) {
        console.log(error);
    }
}

articlePage.load_index = async function () {
    articlePage.index={};
    articlePage.index.loginApi =  articlePage.base_url+"login.php";

    articlePage.index.login =async function(){

        let email = document.getElementById("loginEmail").value;
        let password = document.getElementById("loginPassword").value;

        const responseData= await articlePage.post_data(articlePage.index.loginApi,{
        email,
        password,
        });
        console.log(responseData);
     if (responseData.success) {
        console.log(responseData.success)
        window.location.href="home.html";
     }
    }
    const submitLogin = document.getElementById("submitLogin");
    submitLogin.addEventListener('click',()=>{
        articlePage.index.login();
    })
}