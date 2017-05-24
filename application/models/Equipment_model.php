<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Equipment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		//
		//
		//Equipment
		//
		//

		public function get_equipment($eq_id = FALSE){
			if($eq_id === FALSE){
				$this->db->order_by('eq_category', 'ASC');
				$this->db->join('equipment_groups', 'equipment_groups.eqgroup_id = equipment.eq_group_id', 'left');
				$query = $this->db->get('equipment');
				return $query->result_array();
			}
			$this->db->join('equipment_groups', 'equipment_groups.eqgroup_id = equipment.eq_group_id', 'left');
			$query = $this->db->get_where('equipment', array('eq_id' => $eq_id));
			return $query->row_array();
		}

		public function get_categories($eqcat_id = FALSE){
			if($eqcat_id === FALSE){
				$query = $this->db->get('equipment_categories');
				return $query->result_array();
			}
			$query = $this->db->get_where('equipment_categories', array('eqcat_id' => $eqcat_id));
			return $query->row_array();
		}
		
		public function create_equipment(){
			$data = array(
				'eq_name' => $this->input->post('eq_name'),
				'eq_description' => $this->input->post('eq_description'),
				'eq_consumable' => $this->input->post('eq_consumable'),
				'eq_size' => $this->input->post('eq_size'),
				'eq_brand' => $this->input->post('eq_brand'),
				'eq_supplier' => $this->input->post('eq_supplier'),
				'eq_in_service' => $this->input->post('eq_in_service'),
				'eq_inspection_frequency' => $this->input->post('eq_inspection_frequency'),
				'eq_category' => $this->input->post('eq_category'),
				'eq_date_purchased' => $this->input->post('eq_date_purchased'),
				'eq_end_life' => $this->input->post('eq_end_life'),
				'eq_purchase_type' => $this->input->post('eq_purchase_type'),
				'eq_asset_number' => $this->input->post('eq_asset_number'),
				'eq_serial' => $this->input->post('eq_serial'),
				'eq_group_id' => $this->input->post('eq_group_id')
			);
			return $this->db->insert('equipment', $data);
		}

		public function delete_equipment($eq_id){
			$this->db->where('eq_id', $eq_id);
			$this->db->delete('equipment');
			return true;
		}

		public function update_equipment(){
			$data = array(
				'eq_name' => $this->input->post('eq_name'),
				'eq_description' => $this->input->post('eq_description'),
				'eq_consumable' => $this->input->post('eq_consumable'),
				'eq_size' => $this->input->post('eq_size'),
				'eq_brand' => $this->input->post('eq_brand'),
				'eq_supplier' => $this->input->post('eq_supplier'),
				'eq_in_service' => $this->input->post('eq_in_service'),
				'eq_inspection_frequency' => $this->input->post('eq_inspection_frequency'),
				'eq_category' => $this->input->post('eq_category'),
				'eq_date_purchased' => $this->input->post('eq_date_purchased'),
				'eq_end_life' => $this->input->post('eq_end_life'),
				'eq_purchase_type' => $this->input->post('eq_purchase_type'),
				'eq_asset_number' => $this->input->post('eq_asset_number'),
				'eq_serial' => $this->input->post('eq_serial'),
				'eq_group_id' => $this->input->post('eq_group_id')
			);

			$this->db->where('eq_id', $this->input->post('eq_id'));
			return $this->db->update('equipment', $data);
		}



		//
		//
		//Equipment Groups
		//
		//

		public function get_equipment_groups($eqgroup_id = FALSE){
			if($eqgroup_id === FALSE){
				$query = $this->db->get('equipment_groups');
				return $query->result_array();
			}
			$query = $this->db->get_where('equipment_groups', array('eqgroup_id' => $eqgroup_id));
			return $query->row_array();
		}

		public function get_group_equipment($eq_groupid = FALSE){
			if($eq_groupid === FALSE){
				return null;
			}
			$query = $this->db->get_where('equipment', array('eq_group_id' => $eq_groupid));
			return $query->result_array();
		}	

		public function create_equipment_group(){
			$data = array(
				'eqgroup_name' => $this->input->post('eqgroup_name'),
				'eqgroup_last_checked' => $this->input->post('eqgroup_last_checked'),
				'eqgroup_inspection_frequency' => $this->input->post('eqgroup_inspection_frequency'),
				'eqgroup_description' => $this->input->post('eqgroup_description')
			);
			return $this->db->insert('equipment_groups', $data);
		}

		public function update_equipment_group(){
			$data = array(
				'eqgroup_id' => $this->input->post('eqgroup_id'),
				'eqgroup_name' => $this->input->post('eqgroup_name'),
				'eqgroup_last_checked' => $this->input->post('eqgroup_last_checked'),
				'eqgroup_inspection_frequency' => $this->input->post('eqgroup_inspection_frequency'),
				'eqgroup_description' => $this->input->post('eqgroup_description')
			);

			$this->db->where('eqgroup_id', $this->input->post('eqgroup_id'));
			return $this->db->update('equipment_groups', $data);

		//
		//
		//Issues
		//
		//

		public function get_equipment_issues($eq_id = FALSE){
			if($eq_id === FALSE){
				return null;
			}
			$query = $this->db->get_where('issues', array('iss_eq_id' => $eq_id));
			return $query->result_array();
		}
	}
