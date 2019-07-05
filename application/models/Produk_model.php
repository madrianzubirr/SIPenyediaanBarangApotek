<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";
    private $_tableView = "produk_view";
    private $_tableLaporan = "laporan_view";

    public function rules()
    {
        return [
            [
                'field' => 'namaProduk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'minimalStok',
                'label' => 'Minimal Stok',
                'rules' => 'required'
            ],

            [
                'field' => 'idJenis',
                'label' => 'Jenis Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'idBentuk',
                'label' => 'Bentuk Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'idSatuan',
                'label' => 'Satuan',
                'rules' => 'required'
            ],

            [
                'field' => 'idRak',
                'label' => 'Rak',
                'rules' => 'required'
            ]
        ];
    }

    public function rulesDate(){
        return [
            [
                'field' => 'start',
                'label' => 'Tanggal Mulai',
                'rules' => 'required'
            ],

            [
                'field' => 'end',
                'label' => 'Tanggal Akhir',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_tableView)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_tableView, ["idProduk" => $id])->row();
    }

    public function getNumRow($id)
    {
        return $this->db->get_where($this->_tableView, ["namaProduk" => $id])->num_rows();
    }
    
    public function getLaporan($id){
        $this->db->where("idProduk",$id);
        $this->db->order_by("idLaporan",'DESC');
        return $this->db->get($this->_tableLaporan)->result();
    }
    public function filterDate($id){
        $post = $this->input->post();
        $start = $post["start"];
        $end = $post["end"];
        $this->db->where("idProduk",$id);
        $this->db->where("tanggalLaporan >=",$start);
        $this->db->where("tanggalLaporan <=",$end);
        return $this->db->get($this->_tableLaporan)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->namaProduk = $post["namaProduk"];
        $this->minimalStok = $post["minimalStok"];
        $this->idJenis = $post["idJenis"];
        $this->idBentuk = $post["idBentuk"];
        $this->idSatuan = $post["idSatuan"];
        $this->idRak = $post["idRak"];
        $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->namaProduk = $post["namaProduk"];
        $this->minimalStok = $post["minimalStok"];
        $this->idJenis = $post["idJenis"];
        $this->idBentuk = $post["idBentuk"];
        $this->idSatuan = $post["idSatuan"];
        $this->idRak = $post["idRak"];
        $this->db->update($this->_table, $this, array('idProduk' => $post["id"]));
    }

    public function delete($id)
    {
        $this->db->delete($this->_table, array("idProduk" => $id));
    }
}
