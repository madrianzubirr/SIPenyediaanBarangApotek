<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    private $_table = "pesanan";
    private $_tableView = "pesanan_view";
    private $_tablePP = "pesananproduk";
    private $_tablePPV = "pesananproduk_view";
    private $_tableProduk = "produk";
    

    public function rules()
    {
        return [
                ['field' => 'idPesanan',
                'label' => 'idPesanan',
                'rules' => 'required'],

                ['field' => 'tanggalPesanan',
                'label' => 'tanggalPesanan',
                'rules' => 'required'],

                ['field' => 'idPerusahaan',
                'label' => 'perusahaan',
                'rules' => 'required']
            ];
    }

    public function rulesProduk()
    {
        return [

                ['field' => 'namaProduk',
                'label' => 'nama produk',
                'rules' => 'required'],

                ['field' => 'jumlahBeli',
                'label' => 'jumlah beli',
                'rules' => 'required'],
            ];
    }


    public function getAll(){
        return $this->db->get($this->_tableView)->result();
    }

    public function getAllF(){
        return $this->db->get_where($this->_tableView, ["final" => 1])->result();
    }
    public function getAllNF(){
        return $this->db->get_where($this->_tableView, ["final" => 0])->result();
    }

    public function getById($id){
        return $this->db->get_where($this->_tableView, ["idPesanan" => $id])->row();
    }

    public function getProduk($id){
        return $this->db->get_where($this->_tableProduk, ["namaProduk" => $id])->row();
    }
    
    public function getProdukById($id){
        return $this->db->get_where($this->_tablePPV, ["idPesanan" => $id])->result();
    }

    public function save(){
        $post = $this->input->post();
        $this->idPesanan = $post["idPesanan"];
        $this->tanggalPesanan = $post["tanggalPesanan"];
        $this->idPerusahaan =$post["idPerusahaan"];       
        $this->db->insert($this->_table,$this);
    }

    public function update(){
        $post = $this->input->post();
        $this->tanggalPesanan = $post["tanggalPesanan"];
        $this->idPerusahaan = $post["idPerusahaan"];
        $this->db->update($this->_table, $this, ["idPesanan"=> $post["idPesanan"]]);
    }
    
    public function addProduk($id){
        $post = $this->input->post();
        $this->jumlahBeli =$post["jumlahBeli"];
        $this->idProduk = $this->getProduk($post["namaProduk"])->idProduk;
        $this->idPesanan = $id;
        $this->db->insert($this->_tablePP,$this);        
    }

    public function delete($id)
    {
        $this->db->delete($this->_tablePP, array("idPesanan" => $id));
        return $this->db->delete($this->_table, array("idPesanan" => $id));
    }

    public function deleteProduk($id)
    {
        return $this->db->delete($this->_tablePP, array("idPemesanan" => $id));
    }

    public function finalize($id)
    {
        $this->db->set('final',1);
        $this->db->where('idPesanan',$id);
        return $this->db->update($this->_table);
    }
}