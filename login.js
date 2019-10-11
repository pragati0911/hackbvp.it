const { Sequelize, Model, DataTypes } = require('sequelize');
const sequelize = new Sequelize('sqlite::memory:');

class User extends Model {}
User.init({
  username: DataTypes.STRING,
  password: DataTypes.PASSWORD
}, { sequelize, modelName: 'user' });

sequelize.sync()
  .then(() => User.create({
    username: 'pragati',
    password: new Date(1980);
  }))
  .then(jane => {
    console.log(jane.toJSON());
  });