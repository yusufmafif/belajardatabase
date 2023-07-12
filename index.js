const express = require("express")
const app = express()
const port = 3000
const bodyParser = require("body-parser")
const db = require("./connection")
const response = require("./response")
const cors = require('cors');

app.use(bodyParser.json())
app.use(cors({
  origin: 'http://127.0.0.1:5500'
}));

app.get("/", (req, res) => {
  response(200, "API ready", "success", res)
}) 

app.get("/rpul", (req, res) => {
  const sql = "SELECT * FROM rpul"
  db.query(sql, (err, fields) => {
    response(200, fields, "rpul get list", res)
  })
})

app.get("/rpul/:no", (req, res) => {
  const no = req.params.no
  const sql = `SELECT * FROM rpul WHERE no = ${no}`
  db.query(sql, (err, fields) => {
    if (err) throw err
    response(200, fields, "get detail", res)
  })
})


app.post("/rpul", (req, res) => {
  const { no, namaLengkap, umur, premis } = req.body
  const sql = `INSERT INTO rpul (no, nama_lengkap, umur, premis) VALUES (${no}, '${namaLengkap}', '${umur}', '${premis}')`
  db.query(sql, (err, fields) => {
    if (err) response(500, "invalid", "error", res)
    if (fields?.affectedRows) {
      const data = {
        isSuccess: fields.affectedRows,
        id: fields.insertId,
      }
      response(200, data, "Data added successfully", res)
    }
  })
})

app.put("/rpul", (req, res) => {
  const { no, namaLengkap, umur, premis } = req.body
  const sql = `UPDATE rpul SET nama_lengkap = '${namaLengkap}', umur = '${umur}', premis = '${premis}' WHERE no = ${no}`
  db.query(sql, (err, fields) => {
    if (err) response(500, "invalid, error, res")
    if (fields?.affectedRows) {
      const data = {
        isSuccess: fields.affectedRows,
        message: fields.message,
      }
      response(200, data, "update data successfully", res)
    }
    else {
      response(500, "user tiada", "error", res)
    }
  })
})

// app.delete("/rpul", (req, res) => {
//   const { no } = req.body
//   const sql = `DELETE FROM rpul WHERE no = ${no}`
//   db.query(sql, (err, fields) => {
//     if (err) response(500, "invalid", "error", res)
//     if (fields?.affectedRows) {
//       const data = {
//         isDeleted: fields.affectedRows,
//       }
//       response(200, data, "Deleted Data Successfully", res)
//     } else {
//       response(404, "user not found", "error", res)
//     }
//   })
// })

app.delete("/rpul/delete", (req, res) => {
  const no = req.params.no;
  const sql = `DELETE FROM rpul WHERE no = ${no}`;
  db.query(sql, (err, fields) => {
    if (err) response(500, "invalid", "error", res);
    if (fields?.affectedRows) {
      const data = {
        isDeleted: fields.affectedRows,
      };
      response(200, data, "Deleted Data Successfully", res);
    } else {
      response(404, "user not found", "error", res);
    }
  });
});




app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})
