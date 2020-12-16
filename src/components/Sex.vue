<template>
  <div>

    <div class="stdSelector d-flex">

      <div class="stdSelAnswer">
        <div id="stdSexT1">Ваш пол:&nbsp;</div>
        <div id="stdSexT2"></div>
        <div id="stdSexValue"></div>
      </div>

      <div id="stdSexCalc">
        <div id="stdSexCalcM" class="stdSexCalcBtn " :class="{ 'stdSexCalcM': sexv == 'мужчина' }"  @click="setSex('мужчина')">мужчина</div>
        <div id="stdSexCalcF" class="stdSexCalcBtn  " :class="{ 'stdSexCalcF' : sexv == 'женщина'}" @click="setSex('женщина')">женщина</div>
      </div>

    </div>

    <div class="stdRun">
      <div class="stdRun" id="frmRun">
        <input type="button" class="stdRunButton" @click="save" :disabled="sexv==''" id="frmRunButton" value=" НАЧАТЬ ТЕСТИРОВАНИЕ ">
      </div>
      <div id="stdRunErr" class="stdRunErr">&nbsp;</div>
    </div>

  </div>
</template>

<script>

export default {
  name: "Sex",
  data: function () {
    return {
      sexv: ''
    }
  },

  methods:{
    setSex(type){
      this.sexv=type;
    },
    save(){
      this.$emit('setSex' ,this.sexv);
    }

  }
}
</script>

<style scoped>
.stdSexCalcF {
  background: #FFC0CB;
}
</style>