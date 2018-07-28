<?php


class M_penjualan extends CI_Model {

    //simpan
	function simpan_penjualan_detail_temp($data){
        $this->db->insert('penjualan_detail_temp', $data);
        return true;
    }

    function simpan_penjualan($data){
        $this->db->insert('penjualan', $data);
        return true;
    }

    function simpan_penjualan_detail($data){
        $this->db->insert('penjualan_detail', $data);
        return true;
    }

    function simpan_batch_penjualan_detail($data){
        $this->db->insert_batch('penjualan_detail',$data);
        return true;
    }

     function update_penjualan($param_kode, $kode, $data){
        $this->db->where($param_kode, $kode);
        $this->db->update('penjualan', $data); 
        return true;
    }


    //hapus 
    function hapus_penjualan_detail_temp($param_kode, $kode){
        $this->db->delete('penjualan_detail_temp', array($param_kode => $kode)); 
        return true;
    }

    function hapus_penjualan($param_kode, $kode){
        $this->db->delete('penjualan', array($param_kode => $kode)); 
        return true;
    }

    function hapus_penjualan_detail($param_kode, $kode){
        $this->db->delete('penjualan_detail', array($param_kode => $kode)); 
        return true;
    }

    //list
    function list_penjualan_detail_temp($createdby){
        
        $query=$this->db->get_where('vw_detailtemp',array('detpCreatedBy' => $createdby)); 
        return $query->result();
    }

    function list_penjualan(){
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan','pnjlPlgnKode=plgnKode');
        $query=$this->db->get()->result();
        return $query;

    }

    function list_penjualan2($pnjlKode){
        $this->db->select('*');
        $this->db->from('penjualan_detail');
        $this->db->join('penjualan','detpPnjlKode=pnjlKode');
        $this->db->join('pelanggan','pnjlPlgnKode=plgnKode');
        $this->db->join('barang','detpBrngKode=brngKode');
        $this->db->join('satuan','brngStunKode=stunKode');
        $this->db->where(array('detpPnjlKode'=>$pnjlKode));
        $query=$this->db->get()->result();
        return $query;

    }

    function list_penjualan3($pnjlKode){
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan','pnjlPlgnKode=plgnKode');
        $query=$this->db->get()->row();
        return $query;

    }

    function list_penjualan_detail($kodepenjualan){
        $query=$this->db->get_where('vw_detail',array('detpPnjlKode' => $kodepenjualan)); 
        return $query->result(); 
    }

    function list_view_penjualan(){
        $query=$this->db->get_where('vw_penjualan',array('pnjlTotalBayar>' => 0)); 
        return $query->result(); 
    }

    function list_view_penjualan_1baris($kodepenjualan){
        $query=$this->db->get_where('vw_penjualan',array('pnjlKode' => $kodepenjualan)); 
        return $query->row(); 
    }
    function list_untuk_dashboard(){
        $result=$this->db->query("SELECT *,(TO_DAYS(pnjlJatuhTempo)-TO_DAYS(now()))*-1 as jumlah_hari from vw_penjualan where ((TO_DAYS(pnjlJatuhTempo)-TO_DAYS(now()))*-1)>=-7");
        return $result;
    }

    //kode penjualan
    function kode_penjualan(){
    	//P 0618 00001
    	$this->db->select('Right(pnjlKode,5) as kode',false);
    	
    	$this->db->order_by('pnjlKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('penjualan');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi  = "P-".date("my")."-".$kodemax;
        return $kodejadi;
   	}

    function totalpenjualan($createdby){
        $total=$this->db->query("SELECT COALESCE(sum(subtotal),0) AS total FROM vw_detailtemp WHERE detpCreatedBy='$createdby'")  ;
        return $total->row();  
    }
}