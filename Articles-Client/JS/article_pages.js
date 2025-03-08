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

  articlePage.load_signup= function (){
    articlePage.signup={};
    articlePage.signup.signup_api= articlePage.base_url+"signup.php";

    articlePage.signup.signupData = async function() {
        const username = document.getElementById("username").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        const responseData= await articlePage.post_data(articlePage.signup.signup_api,{
            username,
            email,
            password
        });
        console.log(responseData);
        if (responseData.success) {
           console.log(responseData.success)
           window.location.href="home.html";
        }

    }
   document.getElementById("submitsignup").addEventListener('click',()=>{
    articlePage.signup.signupData();
   })
  }