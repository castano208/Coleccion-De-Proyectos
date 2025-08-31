package com.clecksoft.RestauranteInteligente.models;

public class Restaurante {
	
	private int nitRestaurante;	
	private String nombre;
	private String telefono;
	private String ciudad;
	private String direccion;
	private String descripcion;
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
	public Restaurante(int nitRestaurante, String nombre, String telefono, String ciudad, String direccion,
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
	public Restaurante() {
		
	}
	
	
}
