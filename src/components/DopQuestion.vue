<template>
  <div id="qtlTest">
    <table cellspacing=0 cellpadding=0 border=0 width="100%">

      <tr>
        <td class="qtlBack" title=" Вернуться к предыдущему вопросу ">
          <div id="qtlBack" class="qtlBS qtlBA qtlBack" :class="{qtlDisabled:qtlDisabled}" @click="GoBack();">назад
          </div>
        </td>
        <td class="qtlMeter">
          <div id="qtlMeter" class="qtlBS qtlMeter">
            <div id="qtlMeterLine" class="qtlMeterLine" :style="{ width: width + '%' }">
              <span class="qtlMeterText">{{ text }}</span>
            </div>
          </div>
        </td>
      </tr>

    </table>

    <div class="qtlBlock" v-if="DopQuestions.length">
      <div id="qtlQuestion1" class="qtlBS qtlQuestion">
        <div class="qtlQuestionTxt">{{ DopQuestions[QuestionActive].title }}</div>
      </div>
      <div id="qtlAnswers1" class="qtlAnswers">
        <input v-for="(answer,ind) in DopQuestions[QuestionActive].Answers" :key="ind" type="button"
               class="qtlBS qtlBA qtlAnswerButton" @click="setAnswer(ind)" :value=" answer ">
      </div>
      <div class="qtlAnswers" v-show="DopQuestions[QuestionActive].showText">
        <input type="text" v-model="textInput" class="textInput"
               :placeholder="DopQuestions[QuestionActive].placeholder">
        <input type="button" class="stdRunButton" @click.prevent="save" value=" Дальше ">
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "DopQuestion",
  props: ['DopQuestions'],
  data() {
    return {
      QuestionActive: 0,
      Results: [],
      textInput: ''
    }
  },
  computed: {
    text() {
      return 'Личные данные  ' + (this.QuestionActive + 1) + ' из ' + this.DopQuestions.length;
    },
    // вернутся назад активное или нет
    qtlDisabled() {
      if (this.QuestionActive > 0) {
        return false;
      } else {
        return true;
      }
    },

    // ширина полосы
    width() {
      let z = this.QuestionActive + 1;
      let procent = parseInt(z * 100 / this.DopQuestions.length);
      return procent;
    }

  },
  methods: {
    GoBack() {
      if (this.QuestionActive > 0) {
        this.QuestionActive = this.QuestionActive - 1;
      }
    },
    setAnswer(ind) {
      let z = this.QuestionActive + 1;

      if (this.DopQuestions[this.QuestionActive].showText) {

        this.$emit('setResultDopQuestion', {
          index: this.QuestionActive,
          ind: ind,
          // text:this.textInput,
          ShowResult: false
        })
        return false;
      }

      if (z == this.DopQuestions.length) {
        // последний вопрос
        this.$emit('setResultDopQuestion', {index: this.QuestionActive, ind: ind, ShowResult: true});
      } else {
        this.$emit('setResultDopQuestion', {index: this.QuestionActive, ind: ind, ShowResult: false});
        this.QuestionActive += 1;
      }
    },
    save() {
      let z = this.QuestionActive + 1;
      if (z == this.DopQuestions.length) {
        // последний вопрос
        this.$emit('setResultDopQuestion', {
          index: this.QuestionActive,
          // ind: ind,
          text: this.textInput,
          ShowResult: true
        })
      } else {
        // не последний  вопрос
        this.$emit('setResultDopQuestion', {
          index: this.QuestionActive,
          // ind: ind,
          text: this.textInput,
          ShowResult: false
        })
        this.QuestionActive += 1;
      }
    }
  }
}
</script>
