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
articlePage.get_data =async function(url){
    try {
      const response=await  axios.get(url);
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
        window.location.href="home.html";
     }else{
        popMessage("message",responseData.message);
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
        }else{
            popMessage("message",responseData.message);
         }

    }
   document.getElementById("submitsignup").addEventListener('click',()=>{
    articlePage.signup.signupData();
   })
  }

  articlePage.load_home = function (){
    articlePage.home={};
    articlePage.home.getQuestionApi =articlePage.base_url+"getQuestions.php";
    let searchbar = document.getElementById("searchInput");
    searchbar.addEventListener('keyup',()=>{
        articlePage.home.search();
    });

    articlePage.home.getQuestions = async function() {
      const responseData= await  articlePage.get_data(articlePage.home.getQuestionApi);
      const Qarray = responseData.questions;
      articlePage.home.createCard(Qarray);
      console.log(Qarray);
    }
    articlePage.home.getQuestions();
    articlePage.home.createCard = function(array){
        const cardCont = document.getElementById("cardContainer");
        array.forEach((question)=>{
          let card =   ` <div class="card">
                <div class="card-question">
                    <p>${question.quetion}</p>
                </div>
                <div class="border"></div>
                <div class="card-answer">
                    <p>${question.answer}</p>
                </div>
           </div>`;
            cardCont.innerHTML+=card;
        });
    }
    // search function
    articlePage.home.search = function(){
        let filter = document.getElementById("searchInput").value.toLowerCase();
            let cards = document.querySelectorAll(".card");

            cards.forEach(card => {
                let title = card.querySelector(".card-question").textContent.toLowerCase();
                if (title.includes(filter)) {
                    card.classList.remove("hidden");
                } else {
                    card.classList.add("hidden");
                }
            });
    }

  }

  articlePage.load_addQA = function(){
    articlePage.addQA = {};
    articlePage.addQA.createQA_api = articlePage.base_url+"addQuestion.php";

    document.getElementById("submitQA").addEventListener('click',()=>{
        articlePage.addQA.createQA();
    })
    articlePage.addQA.createQA = async function (){
        const question = document.getElementById("question").value;
        const answer = document.getElementById("answer").value;
       const responseData= await articlePage.post_data(articlePage.addQA.createQA_api,{
            question,
            answer
        })
        console.log(responseData);
        if(responseData.success){
            popMessage("message",responseData.message)
        }else{
            popMessage("message",responseData.message)
        }
    }
  }
  function popMessage(id,message){
      document.getElementById(id).innerText= message ;
     document.getElementById(id).classList.remove("hide");
    setTimeout(() => {
     document.getElementById(id).classList.add("hide");
     document.getElementById(id).innerText= "" ;
    }, 2000);
  }