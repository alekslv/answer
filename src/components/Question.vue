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

    <div class="qtlBlock" v-if="Questions.length">
      <div id="qtlQuestion1" class="qtlBS qtlQuestion">
        <div class="qtlQuestionTxt">{{ Questions[QuestionActive].title }}</div>
      </div>
      <div id="qtlAnswers1" class="qtlAnswers">
        <input v-for="(answer,ind) in Questions[QuestionActive].Answers" :key="ind" type="button"
               class="qtlBS qtlBA qtlAnswerButton" @click="setAnswer(ind)" :value=" answer ">
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "Question",
  data() {
    return {
      QuestionActive: 0,
      Results: [],
    }
  },
  props: ['Questions'],
  computed: {
    text() {
      let z = this.QuestionActive + 1;
      let procent = parseInt(z * 100 / this.Questions.length);
      return 'Вопрос  ' + (this.QuestionActive + 1) + ' из ' + this.Questions.length + ' (' + procent + '%)';
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
      let procent = parseInt(z * 100 / this.Questions.length);
      return procent;
    }
  },
  created() {
  },
  methods: {
    GoBack() {
      if (this.QuestionActive > 0) {
        this.QuestionActive = this.QuestionActive - 1;
      }
    },
    setAnswer(ind) {
      let z = this.QuestionActive + 1;
      if (z == this.Questions.length) {
        this.$emit('setResultItem', {index: this.QuestionActive, ind: ind, ShowResult: true});
      } else {
        this.$emit('setResultItem', {index: this.QuestionActive, ind: ind, ShowResult: false});
        this.QuestionActive += 1;
      }

    }
  }
}
</script>
