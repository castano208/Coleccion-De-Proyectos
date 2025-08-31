package com.clecksoft.RestauranteInteligente.entities;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name ="Restaurante")
public class RestauranteEntity {
	
	@Id	
	@Column(name = "nitRestaurante")
	private int nitRestaurante;
	
	@Column(name = "nombre")
	private String nombre;
	
	@Column(name = "telefono")
	private String telefono;
	
	@Column(name = "ciudad")
	private String ciudad;
	
	@Column(name = "direccion")
	private String direccion;
	
	@Column(name = "descripcion")
	private String descripcion;
	
	@Column(name = "menu")
	private String menu;

	public int getNitRestaurante() {
		return nitRestaurante;
	}

	public void setNitRestaurante(int nitRestaurante) {
		this.nitRestaurante = nitRestaurante;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getTelefono() {
		return telefono;
	}

	public void setTelefono(String telefono) {
		this.telefono = telefono;
	}

	public String getCiudad() {
		return ciudad;
	}

	public void setCiudad(String ciudad) {
		this.ciudad = ciudad;
	}

	public String getDireccion() {
		return direccion;
	}

	public void setDireccion(String direccion) {
		this.direccion = direccion;
	}

	public String getDescripcion() {
		return descripcion;
	}

	public void setDescripcion(String descripcion) {
		this.descripcion = descripcion;
	}

	public String getMenu() {
		return menu;
	}

	public void setMenu(String menu) {
		this.menu = menu;
	}

	public RestauranteEntity(int nitRestaurante, String nombre, String telefono, String ciudad, String direccion,
			String descripcion, String menu) {
		super();
		this.nitRestaurante = nitRestaurante;
		this.nombre = nombre;
		this.telefono = telefono;
		this.ciudad = ciudad;
		this.direccion = direccion;
		this.descripcion = descripcion;
		this.menu = menu;
	}

	public RestauranteEntity() {
		
	}

}
