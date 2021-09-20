<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikel() {
        $query = "SELECT `artikel`.*, `kategori_wisata`.`kategori`
                FROM `artikel` JOIN `kategori_wisata`
                ON `artikel`.`kategori_wisata_id` = `kategori_wisata`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getArtikelBySlug($slug)
    {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }

    public function getKategoriWisata()
    {
        return $this->db->get('kategori_wisata')->result_array();
    }

    public function getImageArtikel($id)
    {
        $query = "SELECT `image` FROM `artikel` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('artikel', $data);
    }

    public function delete($id)
    {
        $this->db->delete('artikel', ['id' => $id]);
    }

    public function createKategori($data = [])
    {
        $this->db->insert('kategori_wisata', $data);
    }

    public function updateKategori($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('kategori_wisata', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->delete('kategori_wisata', ['id' => $id]);
    }

    public function uploadImage($upload_path, $old_image, $new_image)
    {
        if ($new_image) {
            $config['upload_path'] = 'asset/img/' . $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '1024';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                unlink(FCPATH . 'asset/img/artikel/' . $old_image);
                return $this->upload->data('file_name');
            } else {
                // return $this->upload->data($old_image);
                echo $this->upload->display_errors();
            }
        } else {
            return $old_image;
        }
    }

}