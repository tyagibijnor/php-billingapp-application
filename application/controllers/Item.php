<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Item extends CI_Controller {



   /**

    * Get All Data from this method.

    *

    * @return Response

   */

   public function __construct() {

      parent::__construct();

      $this->load->database();

   }



   /**

    * Create from display on this method.

    *

    * @return Response

   */

   public function index()

   {

      $data['data'] = $this->db->get("items")->result();

      $this->load->view('itemlist', $data);

   }



   /**

    * Delete Data from this method.

    *

    * @return Response

   */

   public function delete($id)

   {

       $this->db->delete('items', array('id' => $id));

       echo 'Deleted successfully.';

   }

}
