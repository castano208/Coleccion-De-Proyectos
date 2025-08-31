package com.clecksoft.RestauranteInteligente.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import com.clecksoft.RestauranteInteligente.entities.RestauranteEntity;
import com.clecksoft.RestauranteInteligente.models.Restaurante;
import com.clecksoft.RestauranteInteligente.services.imp.RestauranteServiceImp;

@Controller
@RequestMapping("/adminRestaurante")
public class RestauranteController {

	@Autowired
	@Qualifier("RestauranteServiceImp")
	private RestauranteServiceImp restauranteService;
	
	//Entrar al fomulario
	@GetMapping("registrarRestaurante")
	public String registrar(Model modelo) {
		modelo.addAttribute("restaurante", new Restaurante());
		return "restaurante/Restaurante";
	}

	// Insertar restaurante
	@PostMapping("crearRestaurante")
	public String insertar(Model modelo, RestauranteEntity restaurante) {
		modelo.addAttribute("restaurante", new Restaurante());
		modelo.addAttribute("restaurante", restaurante);
		restauranteService.crearRestaurante(restaurante);
		return "restaurante/Restaurante";
	}

	// Consultar restaurantes
	@GetMapping("consultarRestaurante")
	public String consultar(Model modelo) {
		modelo.addAttribute("restaurante", new Restaurante());
		List<RestauranteEntity> listaRestaurantes = restauranteService.listarRestaurante();
		modelo.addAttribute("listaRestaurantes", listaRestaurantes);
		return "restaurante/ConsultarRestaurante";
	}

	// Eliminar restaurante 
	@PostMapping("eliminarRestaurante")
	public String eliminar(Model modelo, RestauranteEntity restaurante) {
		modelo.addAttribute("restaurante", new Restaurante());
		modelo.addAttribute("restaurante", restaurante);
		restauranteService.borrarRestaurante(restaurante);
		// Consultar restaurantes
		List<RestauranteEntity> listaRestaurantes = restauranteService.listarRestaurante();
		modelo.addAttribute("listaRestaurantes", listaRestaurantes);
		return "restaurante/ConsultarRestaurante";
	}	
	
	//editar restaurante
	@GetMapping("editarRestaurante")
	public String editar(Model modelo) {
		modelo.addAttribute("restaurante", new Restaurante());		
		return "restaurante/EditarRestaurante";
	}
	
	//Buscar por nombre para luego editar
	@PostMapping("buscarRestaurante")
	public String buscar(Model modelo, RestauranteEntity restaurante) {		
		modelo.addAttribute("restaurante", new Restaurante());
		modelo.addAttribute("restaurante", restaurante);		
		modelo.addAttribute("restaurante", restauranteService.consultarporNombre(restaurante.getNombre()));	
		return "restaurante/EditarRestaurante";
	}
	
	
	//-------------PENDIENTE-------------------------------------------
	
	//Actualizar restaurante -----------en Proceso
	@PostMapping("actualizarRestaurante")
	public String actualizar(Model modelo, RestauranteEntity restaurante) {		
		modelo.addAttribute("restaurante", restaurante);		
		restauranteService.crearRestaurante(restaurante);
		return "restaurante/EditarRestaurante";
	}
}
