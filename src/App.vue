<template>
  <div id="app">

    <transition  name="fade">
      <div class="stdSelector d-flex" v-if="!show">

        <div class="stdSelAnswer">
          <div id="stdSexT1">Вы являетесь медицинским работником?</div>
          <div id="stdSexT2"></div>
          <div id="stdSexValue"></div>
        </div>

        <div id="stdSexCalc">
          <div id="stdSexCalcM" class="stdSexCalcBtn "    @click="setType('Да')">Да</div>
          <div id="stdSexCalcF" class="stdSexCalcBtn  "  @click="setType('Нет')">Нет</div>
        </div>

      </div>
    </transition>

    <transition name="fade">
      <Sex v-if="step==1&&show" v-on:setSex="setSex"/>
    </transition>

    <transition name="fade">
      <DopQuestion v-if="step==2&&show"  v-on:setResultDopQuestion="setResultDopQuestion" :DopQuestions="DopQuestions"></DopQuestion>
    </transition>

    <transition name="fade">
      <Question v-if="step==3&&show"  v-on:setResultItem="setResultItem" :Questions="Questions"></Question>
    </transition>

    <transition name="fade">
      <Result v-if="step==4&&show" :Questions="Questions" :DopQuestions="DopQuestions" :sex="sex" ></Result>
<!--      <Result   :Questions="Questions" :DopQuestions="DopQuestions" :sex="sex" ></Result>-->
    </transition>

  </div>
</template>

<script>
import Sex from "@/components/Sex";
import DopQuestion from "@/components/DopQuestion";
import Question from "@/components/Question";
import Result from "@/components/Result";

const axios = require('axios').default;
export default {
  name: 'App',
  components: {
    Sex, Question, Result,DopQuestion
  },
  data() {
    return {
      show:false,
      step:1,
      Questions: [],
      DopQuestions: [],
      sex: '',
    }
  },
  created() {
    let self = this;
    let now = Math.floor(new Date().getTime() / 1000);
    axios.get('/dopquestion.json?date=' + now)
         .then(response=>{
            this.DopQuestions=response.data;
         });
    axios.get('/question.json?date=' + now)
        .then(function (response) {
          self.Questions = response.data;
        })
        .catch(function (error) {
          console.log(error);
        })
        .then(function () {
        });
  },
  methods: {

    setType(ans){
       console.log(ans)
       if(ans=='Да'){
         this.show=true;
       }else{
          location.reload()
       }
    },
    setSex(sex) {
      this.sex = sex;
      this.step = 2;
    },
    // ответы на  дополнительные вопросы
    setResultDopQuestion(data){
      console.log(data)
      if(typeof  data.text!=="undefined"){
        this.DopQuestions[data.index].text=data.text;
      }else {
        this.DopQuestions[data.index].result = data.ind;
      }
      if (data.ShowResult) {
        this.step=3;
      }
    },
    setResultItem(data) {
      this.Questions[data.index].result = data.ind;
      if (data.ShowResult) {
        this.step=4;
      }
    },
  }
}
</script>

