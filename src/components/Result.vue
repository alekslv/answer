<template>
  <div class="Result">

<!--    <a @click="send">111111</a>-->

    <div class="resBody">
      <h3>Результат теста</h3>
      <div id="sclrx" class="resScale">
        <div class="resScaleBlock c">
          <div class="resScaleTitle">Эмоциональное истощение</div>
          <table cellspacing=1 cellpadding=0 border=0 align="center">
            <tr class="resScaleCells">
              <td style="width: 23px" v-for="n in 27" :key="n" :style=" n <= (result1/2) ? 'background: crimson;' : ''">
                &nbsp;
              </td>
              <td class="resScaleVal">{{ result1 }}</td>
            </tr>
            <tr class="resScaleRuler">
              <td title=" низкий уровень эмоционального истощения " colspan=4
                  style="text-align: left; color: green;">[0
              </td>
              <td title=" низкий уровень эмоционального истощения " colspan=3
                  style="text-align: right; color: green;">15]
              </td>
              <td title=" средний уровень эмоционального истощения " colspan=3
                  style="text-align: left; color: olive;">[16
              </td>
              <td title=" средний уровень эмоционального истощения " colspan=2
                  style="text-align: right; color: olive;">24]
              </td>
              <td title=" высокий уровень эмоционального истощения " colspan=8
                  style="text-align: left; color: crimson;">[25
              </td>
              <td title=" высокий уровень эмоционального истощения " colspan=7
                  style="text-align: right; color: crimson;">54]
              </td>
              <td></td>
            </tr>
          </table>
          <div class="resScaleRes" style="color: green;">
            [&nbsp;{{ text1 }}&nbsp;]
          </div>
        </div>
        <div class="resScaleBlock c">
          <div class="resScaleTitle">Деперсонализация</div>
          <table cellspacing=1 cellpadding=0 border=0 align="center">
            <tr class="resScaleCells">

              <td style="width: 20px" v-for="n in 30" :key="n" :style=" n <= result2 ? 'background: crimson;' : ''">
                &nbsp;
              </td>
              <td class="resScaleVal">{{ result2 }}</td>
            </tr>
            <tr class="resScaleRuler">
              <td title=" низкий уровень деперсонализации " colspan=3
                  style="text-align: left; color: green;">[0
              </td>
              <td title=" низкий уровень деперсонализации " colspan=2
                  style="text-align: right; color: green;">5]
              </td>
              <td title=" средний уровень деперсонализации " colspan=3
                  style="text-align: left; color: olive;">[6
              </td>
              <td title=" средний уровень деперсонализации " colspan=2
                  style="text-align: right; color: olive;">10]
              </td>
              <td title=" высокий уровень деперсонализации " colspan=10
                  style="text-align: left; color: crimson;">[11
              </td>
              <td title=" высокий уровень деперсонализации " colspan=10
                  style="text-align: right; color: crimson;">30]
              </td>
              <td></td>
            </tr>
          </table>
          <div class="resScaleRes" style="color: green;">[&nbsp;{{ text2 }}&nbsp;]</div>
        </div>
        <div class="resScaleBlock c">
          <div class="resScaleTitle">Редукция профессиональных достижений</div>
          <table cellspacing=1 cellpadding=0 border=0 align="center">
            <tr class="resScaleCells">
              <td style="width: 12px" v-for="n in 48" :key="n" :style=" n <= result3 ? 'background: crimson;' : ''">
                &nbsp;
              </td>
              <td class="resScaleVal">{{ result3 }}</td>
            </tr>
            <tr class="resScaleRuler">
              <td title=" высокий уровень редукции достижений " colspan=15
                  style="text-align: left; color: crimson;">[0
              </td>
              <td title=" высокий уровень редукции достижений " colspan=15
                  style="text-align: right; color: crimson;">30]
              </td>
              <td title=" средний уровень редукции достижений " colspan=3
                  style="text-align: left; color: olive;">[31
              </td>
              <td title=" средний уровень редукции достижений " colspan=3
                  style="text-align: right; color: olive;">36]
              </td>
              <td title=" низкий уровень редукции достижений " colspan=6
                  style="text-align: left; color: green;">[37
              </td>
              <td title=" низкий уровень редукции достижений " colspan=6
                  style="text-align: right; color: green;">48]
              </td>
              <td></td>
            </tr>
          </table>
          <div class="resScaleRes" style="color: crimson;">[&nbsp;{{ text3 }}&nbsp;]
          </div>
        </div>
      </div>

      <div id="sclrx1" class="resScale">
        <div class="resScaleBlock c">
          <div class="resScaleTitle">Индекс синдрома перегорания</div>
          <table cellspacing=1 cellpadding=0 border=0 align="center">
            <tr class="resScaleCells">
              <td style="width: 12px" v-for="n in 50" :key="n"
                  :style=" n <= ((index*100)/2) ? 'background: blue;' : ''">
                &nbsp;
              </td>
              <td class="resScaleVal">{{ index }}</td>
            </tr>
            <tr class="resScaleRuler">
              <td colspan=25 style="text-align: left; color: blue;">[0</td>
              <td colspan=25 style="text-align: right; color: blue;">1]</td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      <h3>Содержательная интерпретация</h3>
      <p>Синдром психического выгорания по модели Маслач-Джексон представляет собой трехмерный конструкт,
        включающий в себя эмоциональное истощение, деперсонализацию и редукцию профессиональных достижений.</p>
      <p>&bull; <b>Эмоциональное истощение</b> рассматривается как основная составляющая выгорания и проявляется в
        переживаниях сниженного эмоционального тонуса, повышенной психической истощаемости и аффективной
        лабильности, утраты интереса и позитивных чувств к окружающим, ощущении «пресыщенности» работой,
        неудовлетворенностью жизнью в целом.</p>
      <p>&bull; <b>Деперсонализация</b> проявляется в эмоциональном отстранении и безразличии, формальном
        выполнении профессиональных обязанностей без личностной включенности и сопереживания, а в отдельных
        случаях – в негативизме и циничном отношении. В контексте синдрома перегорания «деперсонализация»
        предполагает формирование особых, деструктивных взаимоотношений с окружающими людьми.</p>
      <p>&bull; <b>Редукция профессиональных достижений</b> отражает степень удовлетворенности человека собой как
        личностью и как профессионалом. Неудовлетворительное значение этого показателя отражает тенденцию к
        негативной оценке своей компетентности и продуктивности и, как следствие, – снижение профессиональной
        мотивации, нарастание негативизма в отношении служебных обязанностей, тенденцию к снятию с себя
        ответственности, к изоляции от окружающих, отстраненность и неучастие, избегание работы сначала
        психологически, а затем физически.</p>
      <p>&bull; В 2007 году в НИПНИ им. Бехтерева был предложен способ определения
        <b>системного индекса синдрома перегорания</b> на основании математической модели определения расстояния
        между точками в многомерном пространстве. Данный метод позволяет получить единый количественный
        показатель: итоговое значение может быть от 0 (нет выгорания) до 1 (максимально выраженное выгорание).
      </p>
    </div>
  </div>
</template>

<script>
const axios = require('axios').default;
export default {
  name: "Result",
  data() {
    return {
      result1: 0,
      text1: '',
      result2: 0,
      text2: '',
      result3: 0,
      text3: '',
      index: 0,
    }
  },
  props: ['Questions', 'sex','DopQuestions'],
  mounted() {
    this.res1();
    this.res2();
    this.res3();
    this.getIndex();

  },
  methods: {
    res1() {
      let arr1 = [1, 2, 3, 8, 13, 14, 16, 20];
      arr1.forEach(el => {
        let ind = el - 1;
        let item = this.Questions[ind];
        this.result1 += item.result;
      })
      let item = this.Questions[5];
      this.result1 += item.result;

      if (this.result1 <= 15) {
        this.text1 = 'низкий уровень эмоционального истощения'
      } else if (this.result1 <= 24) {
        this.text1 = 'средний уровень эмоционального истощения'
      } else {
        this.text1 = ' высокий уровень эмоционального истощения'
      }
    },
    res2() {

      let arr1 = [5, 10, 11, 15, 22];
      arr1.forEach(el => {
        let ind = el - 1;
        let item = this.Questions[ind];
        this.result2 += item.result;
      })
      if (this.result2 <= 5) {
        this.text2 = 'низкий уровень деперсонализации'
      } else if (this.result2 <= 10) {
        this.text2 = 'средний уровень деперсонализации'
      } else {
        this.text2 = ' высокий уровень деперсонализации '
      }
    },
    res3() {
      let arr1 = [4, 7, 9, 12, 17, 18, 19, 21];
      arr1.forEach(el => {
        let ind = el - 1;
        let item = this.Questions[ind];
        this.result3 += item.result;
      });

      if (this.result3 <= 30) {
        this.text3 = 'высокий уровень редукции достижений'
      } else if (this.result3 <= 36) {
        this.text3 = 'средний уровень редукции достижений'
      } else {
        this.text3 = ' низкий уровень редукции достижений '
      }
    },
    getIndex() {
      let v1 = Math.pow(this.result1 / 54, 2) + Math.pow(this.result2 / 30, 2) + Math.pow(this.result3 / 48, 2);
      let v2 = v1 / 3;
      let v3 = Math.sqrt(v2)
      this.index = Math.floor(v3 * 100) / 100
      this.send();
    },
    send() {
      axios({
        method: 'post',
        url: '/send.php',
        data: {
          sex: this.sex,
          Questions: this.Questions,
          DopQuestions: this.DopQuestions,
          result1: this.result1,
          result2: this.result2,
          result3: this.result3,
          index: this.index,

        }
      })
          .then((response) => {
            console.log(response);
          }, (error) => {
            console.log(error);
          });
    }
  }
}
</script>
