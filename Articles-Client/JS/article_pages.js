const articlePage={};
const base_url = "";

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
    
}