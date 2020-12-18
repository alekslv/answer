<template>
  <div id="app">



    <transition name="fade">
      <div class="stdSelector d-flex" v-if="step===1">
        <div class="stdSelAnswer">
          <div id="stdSexT1">Вы являетесь медицинским работником?</div>
          <div id="stdSexT2"></div>
          <div id="stdSexValue"></div>
        </div>
        <div id="stdSexCalc">
          <div id="stdSexCalcM" class="stdSexCalcBtn " @click="setType('Да')">Да</div>
          <div id="stdSexCalcF" class="stdSexCalcBtn  " @click="setType('Нет')">Нет</div>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <Sex v-if="step==2" v-on:setSex="setSex"/>
    </transition>

    <transition name="fade">
      <DopQuestion v-if="step==3" v-on:setResultDopQuestion="setResultDopQuestion"
                   :DopQuestions="DopQuestions"></DopQuestion>
    </transition>

    <transition name="fade">
      <div v-show="step===4">
        <input id="address" v-model="address" type="text" placeholder="Ваш город"/>
        <div class="stdRun">
          <div class="stdRun" id="frmRun">
            <input type="button" class="stdRunButton" @click.prevent="step=5" :disabled="disabled" value="Продолжить ">
          </div>
          <div id="stdRunErr" class="stdRunErr">&nbsp;</div>
        </div>
      </div>
    </transition>



    <transition name="fade">
      <Question v-if="step==5" v-on:setResultItem="setResultItem" :Questions="Questions"></Question>
    </transition>

    <transition name="fade">
      <Result v-if="step==6" :Questions="Questions" :DopQuestions="DopQuestions" :sex="sex" :address="address"></Result>
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
    Sex, Question, Result, DopQuestion
  },
  data() {
    return {
      disabled: true,
      step: 1,
      Questions: [],
      DopQuestions: [],
      sex: '',
      address: '',
    }
  },
  watch:{
    address(newV){
       if(newV!==""){
          this.disabled=false;
       }else{
         this.disabled=true;
       }
    }
  },
  created() {
    let self = this;
    let now = Math.floor(new Date().getTime() / 1000);
    axios.get('/dopquestion.json?date=' + now)
        .then(response => {
          this.DopQuestions = response.data;
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
  mounted() {
    let self = this;
    window.jQuery("#address").suggestions({
      token: "e394e87ae261154ba88065ae33912f3ecc4d96cc",
      type: "ADDRESS",
      onSelect: function (suggestion) {
        self.address = suggestion.value;
      }
    });
  },
  methods: {

    setType(ans) {

      if (ans == 'Да') {
        this.step=2;
      } else {
        location.reload()
      }
    },
    setSex(sex) {
      this.sex = sex;
      this.step = 3;
    },
    // ответы на  дополнительные вопросы
    setResultDopQuestion(data) {

      if (typeof data.text !== "undefined") {
        this.DopQuestions[data.index].text = data.text;
      } else {
        this.DopQuestions[data.index].result = data.ind;
      }
      if (data.ShowResult) {
        this.step = 4;
      }
    },
    setResultItem(data) {
      this.Questions[data.index].result = data.ind;
      if (data.ShowResult) {
        this.step = 6;
      }
    },
  }
}
</script>

