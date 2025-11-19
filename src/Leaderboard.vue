<template>
  <br><br><br><br><br><br><br><br><br><br><br>
<div>
  <select v-model="sortBy" @change="toggleDirection" class="select">
    <option value="name">Name</option>
    <option value="city">City</option>
    <option value="score">Score</option>
  </select>
  <button class="button" @click="regenerateWappen(); regenerateScore()">Regenerate</button>
  <button class="button" @click="toggleDirection()">
    <span v-if="ascending">Descending</span>
    <span v-else>Ascending</span>
  </button>
</div>
<div>
  <ul>
    <li v-for="(player, index) in sortedList">
      <span class="rank">{{ index + 1 }}</span>
      <img :src="player.wappen" style="width: 32px;">
      <span class="text">{{ player.name }}</span>
      <span class="city">{{ player.city}}</span> 
      <span class="score">{{ player.score }}</span>
    </li>
  </ul>
</div>  
</template>

<script>
function generateScore(max) {
  return Math.floor(Math.random() * max);
}
function generateWappen(max) {
  const wappen = Math.floor(Math.random() * max) + 1;
  return `./Wappen${wappen}.png`
}

export default {
  data() {
    return{
      sortBy: 'name',
      ascending: true, 
      players: [
      {name: "Lothar Eisenwald", city: "Frankfurt", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Alrik Falkenbruch", city: "Stuttgart", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Gerwig Bärenhardt", city: "München", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Isolde Finsterwald", city: "Hamburg", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Brunhild Steinrufer", city: "Köln", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Eldric Dornhammer", city: "Leipzig", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Hagen Blutmund", city: "Düsseldorf", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Maeve Silberhain", city: "Dortmund", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Thorben Nebelstein", city: "Dresden", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Elara Waldheim", city: "Hannover", score: generateScore(1111), wappen: generateWappen(5)}
    ]
  }
},

methods: {
  regenerateScore(max) {
    this.players.forEach(player => {
      player.score = generateScore(1111);
    });
  },
  regenerateWappen(max) {
    this.players.forEach(player => {
      player.wappen = generateWappen(5);
    });
  },
  toggleDirection() {
    this.ascending = !this.ascending
  }
},

computed: {
  sortedList() {
    let list;
    if (this.sortBy === 'score') {
      list = [...this.players].sort((a, b) => a.score - b.score);
    } 
    else {
      list = [...this.players].sort((a, b) => a[this.sortBy].localeCompare(b[this.sortBy]));
    }
    return this.ascending ? list : list.reverse();
  }
}

} 
</script>

<style>
@font-face {
  font-family: "Chomsky";
  src: url("https://db.onlinewebfonts.com/t/00048069ded7ec58aa6b96ccaff5f759.woff2") format("woff2"),
       url("https://db.onlinewebfonts.com/t/00048069ded7ec58aa6b96ccaff5f759.woff") format("woff"),
       url("https://db.onlinewebfonts.com/t/00048069ded7ec58aa6b96ccaff5f759.ttf") format("truetype");
}
:root {
  --background: #979366ff;
  --text: #DBD7CEff;
  --text_city: rgb(206, 202, 191);
  --button: #DBD7CEff;
  --button_text: #C53929ff;
  --li: #3E1815ff;
  --score: #C53929ff;
  --font: Chomsky;
  --font_bold: Chomsky;
  --font_size: 15px;
  --font_weight: light;
}

body {
  max-width: 500px;
  margin: 20px auto;
  transform: scale(1.5);
}
ul {
  padding: 0px;
  margin: 0px;
}
li {
  display: flex;
  align-items: center;
  margin: 5px auto;
  background: var(--li);
  border-radius: 8px;
  padding: 10px 20px;
}
.rank {
  width: 10px;
  text-align: right;
  margin-right: 10px;
  font-size: var(--font_size);
  font-family: var(--font);
  color: var(--score);
}

.button {
  margin-left: 0px;
  margin-right: 8px;
  padding: 6px 12px;
  font-family: var(--font);
  background: var(--button);
  color: var(--button_text);
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.select {
  margin-left: 0px;
  margin-right: 8px;
  padding: 5px 4px;
  font-family: var(--font);
  background: var(--button);
  color: var(--button_text);
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.text {
  text-align: left;
  flex: 2;
  font-family: var(--font_bold);
  margin-left: 4px;
  white-space: nowrap;
  font-size: 20px;
  color: var(--text);
  overflow: hidden;
  text-overflow: ellipsis;
}
.city {
  text-align: left;
  flex: 1;
  font-family: var(--font);
  margin-right: 10px;
  font-size: var(--font_size);
  color: var(--text_city);
}
.score {
  width: 80px;
  text-align: right;
  font-family: var(--font_bold);
  font-weight: bold;
  font-size: 13px;
  color: var(--score);
}
</style>